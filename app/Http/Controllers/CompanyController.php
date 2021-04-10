<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;


use Carbon\Carbon;
use Auth;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
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
     * Criar empresa.
     *
     * Cria uma nova empresa.
     *
     * @bodyParam user_id integer required ID do usuario proprietario da empresa
     * @bodyParam nome string required Nome fantasia da empresa
     * @bodyParam website string URL customizada da empresa Ex: minhaloja.estoqueintegrado.com|minhaloja.com.br
     * @bodyParam razao_social string Razão social da empresa
     * @bodyParam cnpj string required CNPJ da empresa com ou sem formatação
     * @bodyParam telefone string Telefone da empresa
     * @bodyParam celular string Celular da empresa
     * @bodyParam email string Email da empresa
     * @bodyParam logo string Path do caminho da logo salva
     * @bodyParam icone string Path do ícone da empresa
     * @bodyParam matriz boolean Se essa empresa é matriz(1) ou filial (0)
     * @bodyParam modo_catalogo boolean Exibir banners na loja. 1 = sim, 0 = não. Default 0
     *
     * @group Empresas
     * @authenticated
     *
     * @response {
     *      "id":1,
     *      "nome":"Nome da empresa",
     *      "website":"Domínio da empresa",
     *      [...]
     * }
     * @throws ValidationException
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            Company::getValidationRules(),
            Company::getMessageRules()
        );

        try {
            $inputs = $request->except('api_token');
            $loggedUser = Auth::user();
            $user = User::find($inputs['user_id']);

            // Somente o admin pode cadastrar empresas
            if ($loggedUser->id != $user->id && !$loggedUser->isAdmin()) {
                return response(['message' => 'Acesso negado!'], 403);
            }

            $inputs['cnpj'] = $this->formatarCnpj($inputs['cnpj'], true);
            $inputs['telefone'] = $this->formatarTelefone($inputs['telefone'] ?? null, true);
            $inputs['celular'] = $this->formatarTelefone($inputs['celular'] ?? null, true);
            $inputs['modo_catalogo'] = $inputs['modo_catalogo'] ?? 1;

            $company = Company::create($inputs);

            // Cria o JOB para enviar o email posteriormente
//            $this->createJobSendMail($company->user, $company, 'emails.cadastroUsuario');

            return $company;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Lista de empresas do usuario.
     *
     * Retorna a lista de empresas que o usuário está associado.
     *
     * @bodyParam id integer required ID do usuario
     *
     * @group Empresas
     * @authenticated
     *
     * @response
     * [{
     *      "id":1,
     *      "nome":"Nome da empresa",
     *      "website":"Domínio da empresa",
     *      [...]
     * },
     * {
     *      "id":2,
     *      "nome":"Nome da empresa",
     *      "website":"Domínio da empresa",
     *      [...]
     * }]
     *
     */
    public function getMyCompanies(Request $request)
    {
        return Company::where('user_id', $request->input('id'))->get();
    }


    /**
     * Detalhes empresa.
     *
     * Retorna os detalhes da empresa.
     *
     * @urlParam id integer required ID da empresa
     *
     * @group Empresas
     * @authenticated
     *
     * @response {
     * {
     *      "id":1,
     *      "nome":"Nome da empresa",
     *      "website":"Domínio da empresa",
     *      [...]
     * }
     */
    public function getCompany(Request $request, $id)
    {
        try {

            if (!$this->userCanEditCompany($id))
                return response(['message' => 'Empresa não pertence ao usuário!'], 403);

            $company = Company::find($id);

            if (!$company)
                return response(['message' => 'Empresa não encontrada!'], 404);

            return $company;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Atualizar empresa.
     *
     * Atualiza dados da empresa.
     * Usa softDeletes()
     *
     * @urlParam id integer required ID do usuario proprietario da empresa
     *
     * @group Empresas
     * @authenticated
     *
     * @response {
     *
     *      "id":1,
     *      "nome":"Nome da empresa",
     *      "website":"Domínio da empresa",
     *      [...]
     * }
     */
    public function update(Request $request, $id)
    {
        try {
            if (!$this->userCanEditCompany($id))
                return response(['message' => 'Company não pertence ao usuário!'], 403);

            $inputs = $request->except('api_token', 'user_id');
            $inputs['cnpj'] = $this->formatarCnpj($inputs['cnpj'], true);
            $inputs['telefone'] = $this->formatarTelefone($inputs['telefone'], true);

            Company::where('id', $id)->update($inputs);

            return Company::find($id);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Deletar empresa.
     *
     * Deleta a empresa.
     * Usa softDeletes()
     *
     * @urlParam id integer required ID da empresa
     *
     * @group Empresas
     * @authenticated
     *
     * @response {
     *      "message":"Company deletada!"
     * }
     */
    public function delete(Request $request, $id)
    {
        try {
            if (!$this->userCanEditCompany($id))
                return response(['message' => 'Company não pertence ao usuário!'], 403);

            $company = Company::find($id);
            $company->delete();

        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }
}
