<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Address;
use Auth;

class AddressController extends Controller
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
     * Criar Endereço
     *
     * Cria uma Endereço
     *
     * @bodyParam empresa_id integer required ID da empresa
     * @bodyParam user_id integer required ID do usuário
     * @bodyParam rua string required Nome da rua
     * @bodyParam numero integer required Numero do endereço
     * @bodyParam bairro string Nome do bairro
     * @bodyParam complemento string Complemento
     * @bodyParam cidade string Nome da cidade
     * @bodyParam uf string Sigla do estado <small>Ex: MG</small>
     * @bodyParam pais string País
     * @bodyParam cep string Cep da rua
     * @bodyParam padrao boolean Se o endereço é o padrão
     * @bodyParam ativo boolean Se o endereço está ativo ou não. <small>Default: 1</small>
     *
     * @group Endereço
     * @authenticated
     * @response {
     *      "id": 1,
     *      "rua": "Nome da rua",
     *      "numero": 322,
     *      "bairro": "bairro"
     *      [...]
     * }
     * @param Request $request
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            Address::getValidationRules(),
            Address::getValidationMessages()
        );

        if($request->input('empresa_id') && !$this->userCanEditCompany($request->input('empresa_id')))
            return response(['message' => 'Empresa não pertence ao usuário!'], 403);

        try {
            $inputs = $request->except('api_token');

            return Address::create($inputs);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Detalhes Endereço
     *
     * Retorna os detalhes do endereço
     *
     * @group Endereço
     * @urlParam id integer required ID do endereço
     * @param Request $request
     *
     * @response {
     *      "id": 1,
     *      "rua": "Nome da rua",
     *      "numero": 322,
     *      "bairro": "bairro"
     *      [...]
     * }
     */
    public function view(Request $request, $id)
    {
        try {
            $address = Address::where('id', $id)->first();

            if(!$address)
                return response(['message' => 'Endereço não encontrado!'], 404);

            return $address;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Atualizar Endereço
     *
     * Atualiza os dados do endereço
     *
     * @urlParam id integer required ID da endereço
     * @bodyParam rua string required Nome da rua
     * @bodyParam numero integer required Numero do endereço
     * @bodyParam bairro string Nome do bairro
     * @bodyParam complemento string Complemento
     * @bodyParam cidade string Nome da cidade
     * @bodyParam uf string Sigla do estado <small>Ex: MG</small>
     * @bodyParam pais string País
     * @bodyParam cep string Cep da rua
     * @bodyParam padrao boolean Se o endereço é o padrão
     * @bodyParam ativo boolean Se o endereço está ativo ou não. <small>Default: 1</small> * @param Request $request
     *
     * @group Endereço
     * @authenticated
     * @response {
     *      "id": 1,
     *      "rua": "Nome da rua",
     *      "numero": 322,
     *      "bairro": "bairro"
     *      [...]
     * }
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            Address::getValidationRules($id),
            Address::getValidationMessages()
        );
        try {
            $address = Address::find($id);
            $loggedUser = Auth::user();

            if(!$address)
                return response(['message' => 'Endereço não encontrado!'], 404);

            if($request->input('empresa_id') && !$this->userCanEditCompany($request->input('empresa_id')))
                return response(['message' => 'Empresa não pertence ao usuário!'], 403);

            if($request->input('user_id') && $loggedUser->id != $request->input('user_id'))
                return response(['message' => 'Endereço não pertence ao usuário!'], 403);

            Address::where('id', $id)->update($request->except('api_token', 'empresa_id', 'user_id'));

            return Address::find($id);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Deletar Endereço
     *
     * Deleta o endereço
     *
     * @group Endereço
     * @urlParam id integer required ID do endereço
     *
     * @response scenario=success {
     *      "message": "Endereço deletado!",
     * }
     */
    public function delete(Request $request, $id)
    {
        try {
            $address = Address::find($id);

            if(!$address)
                return response(['message' => 'Endereço não encontrado!'], 404);

            if($address->empresa_id && !$this->userCanEditCompany($request->company->id))
                return response(['message' => 'Empresa não pertence ao usuário!'], 403);

            if($address->user_id && Auth::user()->id != $address->user_id)
                return response(['message' => 'Endereço não pertence ao usuário!'], 403);

            $address->delete();

            return response(['message' => 'Endereço deletado!']);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }
}
