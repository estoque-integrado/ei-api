<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
     * Criar usuário
     *
     * Cria um usuário.
     *
     * @group Usuarios
     * @bodyParam name string required Nome do usuário
     * @bodyParam cpf string required Cpf com ou sem formatação Ex: 111.111.111-11
     * @bodyParam email string required Email do usuário Ex: teste@estoqueintegrado.com
     * @bodyParam password string Senha do usuário
     * @bodyParam celular string Celular do usuário
     *
     * @response scenario=success {
     *      "id":1,
     *      "name": "Nome usuario",
     *      "email": "teste@estoqueintegrado.com"
     *      [...]
     * }
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            User::getValidationRules(),
            User::getValidationMessages()
        );

        try {
            $inputs = $request->except('api_token');
            $inputs['tipo_usuario_id'] = $inputs['tipo_usuario_id'] ?? 4;
            $inputs['password'] = app('hash')->make($inputs['password']);

            if ($inputs['tipo_usuario_id'] != 4) {
                $user = User::where('api_token', $request->input('api_token'))->first();

                if (!$user) return response(["message" => "Usuário não encontrado"], 404);

                if ($user->tipo_usuario_id != 1) { // admin
                    return response(['message' => 'Acesso negado!'], 403);
                }
            }

            $user = User::create($inputs);

            // Cria o JOB para enviar o email posteriormente
            //        $this->createJobSendMail($empresa->user, $empresa, 'emails.cadastroUsuario');

            return json_encode($user);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Read
     */
    public function getAll()
    {
        return User::all();
    }


    /**
     * Detalhes usuario.
     *
     * Retorna os detalhes do Usuario.
     *
     * @urlParam id integer required ID da Usuario
     *
     * @group Usuarios
     * @authenticated
     *
     * @response {
     * {
     *      "id":1,
     *      "nome":"Nome do usuario",
     *      "email":"usuario@estoqueintegrado.com",
     *      [...]
     * @response status=404 scenario="user not found" {
     *      "message": "usuário não encontrado."
     * }
     */
    public function getUser(Request $request, $id)
    {
        try {
            $loggedUser = Auth::user();
            $user = User::find($id);

            if (!$user)
                return response(['message' => 'Usuário não encontrado!'], 404);

            if ($loggedUser->id != $user->id && !$loggedUser->isAdmin())
                return response(['message' => 'Acesso negado!.'], 403);

            return $user;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * Atualizar usuario
     *
     * Atualiza os dados de um usuário
     *
     * @urlParam id integer required ID do usuário
     * @group Usuarios
     * @authenticated
     *
     * @response scenario=success {
     *      "id": 1,
     *      "name": "Ronierison Sena"
     *      "email": "teste@teste.com"
     *      [...]
     * }
     * @response status=404 scenario="user not found" {
     *      "message": "usuário não encontrado."
     * }
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::where(['id' => $id, 'api_token' => $request->input('api_token')])->first();

            if (!$user) return response(["message" => "Usuário não encontrado"], 404);

            $this->validate(
                $request,
                User::getValidationRules($user->id),
                User::getValidationMessages()
            );

            // Atualiza usuário
            User::where('id', $id)->update($request->except('id'));

            return $user;
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }


    /**
     * Deletar usuario
     *
     * Deletar um usuário
     *
     * @bodyParam id integer required ID do usuário
     * @group Usuarios
     * @authenticated
     *
     * @response scenario=success {
     *      "id": 1,
     *      "name": "Ronierison Sena"
     *      "email": "teste@teste.com"
     *      [...]
     * }
     * @response status=404 scenario="user not found" {
     *      "message": "usuário não encontrado."
     * }
     */
    public function delete(Request $request, $id)
    {
        try {
            $user = User::where(['id' => $id, 'api_token' => $request->input('api_token')])->first();

            if (!$user) return response(["message" => "Usuário/Token não encontrados"], 404);

            $user->delete();

            return response(['message' => 'Usuário deletado!']);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }
}
