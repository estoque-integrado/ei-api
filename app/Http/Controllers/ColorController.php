<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Color;

class ColorController extends Controller
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
     * Criar Cor
     *
     * Cria uma cor
     *
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     * @bodyParam nome string required Nome do tamanho <small>Ex: 50ml|P|300g</small>
     * @bodyParam hex string required Hexadecimal da cor Ex: #000000
     *
     * @group Cores
     * @authenticated
     * @response {
     *      "id": 1,
     *      "nome": "Preto",
     *      "hex": #000000,
     * }
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            Color::getValidationRules(),
            Color::getValidationMessages()
        );

        if(!$this->userCanEditCompany($request->company->id))
            return response(['message' => 'Empresa não pertence ao usuário!'], 403);

        try {
            $inputs = $request->only('nome', 'hex');
            $inputs['empresa_id'] = $request->company->id;

            // Verifica se a cor ja existe
            $exists = Color::where(['nome' => $inputs['nome'], 'empresa_id' => $request->company->id])->first();

            if($exists)
                return response(['message' => 'Essa Cor ja existe!'], 403);

            return Color::create($inputs);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Detalhes Cor
     *
     * Retorna os detalhes da Cor
     *
     * @urlParam id integer required ID da cor
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     *
     * @group Cores
     * @authenticated
     * @response {
     *      "id": 1,
     *      "nome": "Preto",
     *      "empresa_id": 322,
     * }
     */
    public function view(Request $request, $id)
    {
        try {
            $color = Color::where(['id' => $id, 'empresa_id' => $request->company->id])->first();

            if(!$color)
                return response(['message' => 'Cor não encontrado!'], 404);

            return $color;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Atualizar Cor
     *
     * Atualiza os dados da cor
     *
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     * @bodyParam nome string required Nome do tamanho <small>Ex: 50ml|P|300g</small>
     * @bodyParam hex string required Hexadecimal da cor Ex: #000000
     *
     * @group Cores
     * @authenticated
     * @response {
     *      "id": 1,
     *      "nome": "Preto",
     *      "hex": #000000,
     * }
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            Color::getValidationRules($id),
            Color::getValidationMessages()
        );
        try {
            $color = Color::where(['id' => $id, 'empresa_id' => $request->company->id])->first();

            if(!$color)
                return response(['message' => 'Cor não encontrada!'], 404);

            if(!$this->userCanEditCompany($request->company->id))
                return response(['message' => 'Empresa não pertence ao usuário!'], 403);


            Color::where('id', $id)->update($request->only('nome', 'hex'));

            return Color::find($id);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Deletar Cor
     *
     * Deleta uma cor
     *
     * @urlParam id integer required ID da Cor
     * @bodyParam dominio string required Dominio da empresa <br>
     * <i><small>Ex: minhaempresa | minhaempresa.estoqueintegrado.com.br | minhaempresa.com.br</i></small>
     *
     * @group Cores
     * @authenticated
     * @response {
     *      "message": "Cor deletada!",
     * }
     */
    public function delete(Request $request, $id)
    {
        try {
            $color = Color::where(['id' => $id, 'empresa_id' => $request->company->id])->first();

            if(!$color)
                return response(['message' => 'Cor não encontrada!'], 404);

            if(!$this->userCanEditCompany($color->company->id))
                return response(['message' => 'Empresa não pertence ao usuário!'], 403);

            $color->delete();

            return response(['message' => 'Cor deletada!']);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }
}
