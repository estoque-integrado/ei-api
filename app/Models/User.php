<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'rg',
        'celular',
        'ativo',
        'bloqueado',
        'last_login',
        'token_login_rede_social',
        'tipo_usuario_id',
        'empresa_id',
        'tipo_plano',
        'temp_login_token',
        'api_token',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Retorna os IDS das empresas onde o usuário seja o PROPRIETÁRIO
     *
     * @return Array
     */
    public function getIdsMyOwnCompanies()
    {
        return Company::where('user_id', $this->id)
            ->pluck('id')->toArray();
    }


    /**
     * Retorna os IDS das empresas que o usuário administra
     *
     * @return Array
     */
    public function getIdsMyCompanies()
    {
        return Company::where('user_id', $this->id)->orWhereHas('usuarios', function ($query) {
            $query->where('user_id', $this->id);
        })->pluck('id')->toArray();
    }

    /**
     * Verifica se o usuário é admin
     */
    public function isAdmin()
    {
        return $this->tipo_usuario_id == 1;
    }

    /**
     * Retorna as regras de validação
     *
     * @return Array
     */
    public static function getValidationRules($userId = null)
    {

        $dados = [
            'name' => 'required|string|max:200',
            'email' => array('required', 'email', "unique:users,email,{$userId},id"),
            'cpf' => array('required', 'regex:/(\d{3})\.?(\d{3})\.?(\d{3})\-?(\d{2})/', "unique:users,cpf,{$userId},id"),
            'rg' => array('regex:/(\w{2})?(\d{2})\.?(\d{3})\.?(\d{3})/', "unique:users,rg,{$userId},id"),
            'celular' => array('regex:/\(?(\d{2})\)?\s?(\d{1})\s?(\d{4})\-?(\d{4})?/'),
        ];

        return $dados;
    }

    /**
     * Mensagens de validação
     *
     * @return Array
     */
    public static function getValidationMessages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'name.max' => 'O campo :attribute deve ter no máximo 80 caracteres!',
            'string' => 'O campo :attribute deve ser string!',
            'unique' => 'Esse :attribute ja está cadastrado!',
            'numeric' => 'O campo :attribute deve conter somente numeros!',
            'email' => 'O campo email deve ser um email válido!',
            'digits' => 'O campo :attribute deve conter 11 caracteres!',
            'regex' => 'O campo :attribute está em um formato inválido!',
        ];
    }
}
