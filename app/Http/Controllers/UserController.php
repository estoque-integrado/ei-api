<?php

namespace App\Http\Controllers;

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
     * @bodyParam api_token string required Token do usuário Example: b71175dd5644180d4bce21d1790bb0cf-eccbc87e4b5ce2fe28308fd9f2a7baf3
     * @bodyParam name string required Nome do usuário
     * @bodyParam cpf string required Cpf com ou sem formatação EX: 111.111.111-11 | 11111111111
     * @bodyParam email string required Email do usuário EX: teste@estoqueintegrado.com
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

        $inputs = $request->except('api_token');
        $inputs['tipo_usuario_id'] = $inputs['tipo_usuario_id'] ?? 4;

        if ($inputs['tipo_usuario_id'] != 4) {
            $user = User::where('api_token', $request->input('api_token'))->first();

            if (!$user) return response(["message" => "Usuário não encontrado"], 404);

            if ($user->tipo_usuario_id != 1) { // admin
                return response(['message' => 'Acesso negado!'], 403);
            }
        }

        $user = User::create($inputs);

        return json_encode($user);
    }


    /**
     * Read
     */
    public function getAll()
    {
        return User::all();
    }


    /**
     * Atualizar usuario
     *
     * Atualiza os dados de um usuário
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
    public function update(Request $request)
    {
        $user = User::find($request->input('id'));

        if (!$user) return response(["message" => "Usuário não encontrado"], 404);

        $this->validate(
            $request,
            User::getValidationRules($user->id),
            User::getValidationMessages()
        );

        // Atualiza usuário
        User::where('id', $request->input('id'))->update($request->except('id'));

        return $user;
    }


    /**
     * Delete
     *
     * @return Json
     */
    public function delete(Request $request, $id)
    {
        $user = User::where(['id' => $id, 'api_token' => $request->input('api_token')])->first();
        if (!$user) return response(["message" => "Usuário/Token não encontrados"], 404);

        $user->delete();

        return response(['message' => 'Usuário deletado!']);
    }
}
