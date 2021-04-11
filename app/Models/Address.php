<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'enderecos';

    protected $fillable = [
        'id',
        'nome',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'pais',
        'cep',
        'user_id',
        'empresa_id',
        'padrao',
        'ativo',
    ];


    /**
     * Retorna as regras de validação do endereço
     */
    public static function getValidationRules()
    {
        return [
            'empresa_id' => 'required_if:user_id,null|integer|exists:empresas,id',
            'user_id' => 'required_if:empresa_id,null|integer|exists:users,id',
            'rua' => 'required|string|max:150',
            'numero' => 'required|integer',
            'bairro' => 'required|string|max:150',
            'complemento' => 'string|max:50',
            'cidade' => 'required|string|max:150',
            'uf' => 'required|string|max:3',
            'pais' => 'required|string|max:50',
            'cep' => 'required|string|max:14',
            'padrao' => 'boolean',
            'ativo' => 'boolean',
        ];
    }

    /**
     * Mensagens de validação da categoria
     */
    public static function getValidationMessages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'max' => 'O campo :attribute deve conter no máximo 150 caracteres!',
            'max.complemento' => 'O campo :attribute deve conter no máximo 50 caracteres!',
            'max.cep' => 'O campo :attribute deve conter no máximo 14 caracteres!',
            'integer' => 'O campo :attribute deve ser um numero!',
            'string' => 'O campo :attribute deve ser do tipo string!',
            'boolean' => 'O campo :attribute deve ser do tipo boolean!',
            'empresa_id.exists' => 'A Empresa deve estar cadastrada e ativa no banco de dados!',
            'user_id.exists' => 'O usuário deve estar cadastrado e ativo no banco de dados!',
            'exists' => 'Deve existir no banco!',
        ];
    }

    public function getAddressString()
    {
        $formatado = "";
        $formatado .= $this->rua ? $this->rua : "";
        $formatado .= $this->numero ? ", " . $this->numero : "S/N";
        $formatado .= $this->complemento ? " - " . $this->complemento : "";
        $formatado .= $this->bairro ? " - " . $this->bairro : "";
        $formatado .= $this->cidade ? "<br>" . $this->cidade : "";
        $formatado .= $this->uf ? "/" . $this->uf : "";
        $formatado .= $this->cep ? " - CEP: " . $this->cep : "";

        return $formatado;
    }

    // ===== RELAÇÔES
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Empresa
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
