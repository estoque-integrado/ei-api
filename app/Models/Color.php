<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;

    protected $table = 'cores';

    protected $fillable = [
        'empresa_id',
        'nome',
        'hex',
    ];

    /**
     * Retorna as regras de validação do endereço
     */
    public static function getValidationRules()
    {
        return [
            'empresa_id' => 'required|integer|exists:empresas,id',
            'nome' => 'required|string|max:150',
            'hex' => ['required','string','max:7', 'regex:/^#([a-zA-Z0-9]{6}$)/'],
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
            'hex.max' => 'O campo Hex deve conter no máximo 7 caracteres!',
            'integer' => 'O campo :attribute deve ser um numero!',
            'string' => 'O campo :attribute deve ser do tipo string!',
            'regex' => 'O hex da cor deve ser no seguinte formato: #0000AA',
            'empresa_id.exists' => 'A Empresa deve estar cadastrada e ativa no banco de dados!',
        ];
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'empresa_id')->withTrashed();
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
