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
     * Create
     * 
     * @return \App\Models\User|Json
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
                return response('Acesso negado!', 403);
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
     * Update
     * 
     * @return \App\Models\User|Json
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
