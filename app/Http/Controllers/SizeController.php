<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Criar Tamanho
     *
     * Cria um tamanho
     *
     * @bodyParam empresa_id integer required ID da empresa
     * @bodyParam nome string required Nome do tamanho <small>Ex: 50ml|P|300g</small>
     *
     * @group Tamanhos
     * @authenticated
     * @response {
     *      "id": 1,
     *      "nome": "P",
     *      "empresa_id": 322,
     * }
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            Size::getValidationRules(),
            Size::getValidationMessages()
        );

        if(!$this->userCanEditCompany($request->input('empresa_id')))
            return response(['message' => 'Empresa não pertence ao usuário!'], 403);

        try {
            $inputs = $request->except('api_token');

            // Verifica se o tamanho ja existe
            $exists = Size::where(['nome' => $inputs['nome'], 'empresa_id' => $inputs['empresa_id']])->first();

            if($exists)
                return response(['message' => 'Esse tamanho ja existe!'], 403);

            return Size::create($inputs);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Detalhes Tamanho
     *
     * Retorna os detalhes do Tamanho
     *
     * @group Tamanhos
     * @urlParam id integer required ID do Tamanho
     * @param Request $request
     *
     * @group Tamanhos
     * @authenticated
     * @response {
     *      "id": 1,
     *      "nome": "P",
     *      "empresa_id": 322,
     * }
     */
    public function view(Request $request, $id)
    {
        try {
            $size = Size::where('id', $id)->first();

            if(!$size)
                return response(['message' => 'Tamanho não encontrado!'], 404);

            return $size;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Atualizar Tamanho
     *
     * Atualiza os dados do tamanho
     *
     * @urlParam id integer required ID do tamanho
     * @bodyParam empresa_id integer required ID do tamanho
     * @bodyParam nome string required Nome do tamanho <small>Ex: 50ml|P|300g</small>
     *
     * @group Tamanhos
     * @authenticated
     * @response {
     *      "id": 1,
     *      "nome": "P",
     *      "empresa_id": 322,
     * }
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            Size::getValidationRules($id),
            Size::getValidationMessages()
        );
        try {
            $size = Size::find($id);

            if(!$size)
                return response(['message' => 'Tamanho não encontrado!'], 404);

            if(!$this->userCanEditCompany($size->company->id))
                return response(['message' => 'Empresa não pertence ao usuário!'], 403);


            Size::where('id', $id)->update($request->only('nome'));

            return Size::find($id);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Deletar Tamanho
     *
     * Deleta um tamanho
     *
     * @urlParam id integer required ID do tamanho
     *
     * @group Tamanhos
     * @authenticated
     * @response {
     *      "message": "Tamanho deletado!",
     * }
     */
    public function delete(Request $request, $id)
    {
        try {
            $size = Size::find($id);

            if(!$size)
                return response(['message' => 'Tamanho não encontrado!'], 404);

            if(!$this->userCanEditCompany($size->company->id))
                return response(['message' => 'Empresa não pertence ao usuário!'], 403);

            $size->delete();

            return response(['message' => 'Tamanho deletado!']);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }
}
