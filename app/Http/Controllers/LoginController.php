<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Jobs\UserJob;
use Carbon\Carbon;

class LoginController extends Controller
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
     * Login
     *
     * Faz o login do usuario
     * Se email e senha coincidirem, gera um md5 da data concatenando com o ID do usuário
     * e salva no campo api_token com o tempo definido no arquivo .env TIME_TO_RESET_TOKEN
     *
     * @group Usuarios
     * @bodyParam login string required Email do usuário
     * @bodyParam password string required Senha do usuário
     *
     * @response string
     */
    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required|string',
            ],
            []
        );

        try {
            $user = User::where('email', $request->input('email'))->first();

            if ($user && Hash::check($request->input('password'), $user->password)) {
                // Cria o token
                $token = md5(Carbon::now()) . '-' . md5($user->id);
                $user->api_token = $token;
                $user->save();

                // Adicionar um JOB para limpar o token após 24h
//                $job = (new UserJob($user))->delay(Carbon::now()->addHours(config('TIME_TO_RESET_TOKEN', 24)));
//                $this->dispatch($job);

                return $token;
            } else {
                return response(['message' => 'Usuário e/ou senha incorretos.'], 401);
            }
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 422);
        }
    }
}
