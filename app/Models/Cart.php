<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model do Cart
 */
class Cart extends Model
{

    protected $table = 'carrinho';

    protected $fillable = [
        'produto_id',
        'empresa_id',
        'user_id',
        'quantidade',
        'valor_produto',
        'subtotal',
        'cor_id',
        'tamanho_id',
        'token',
    ];


    /**
     * Retorna as regras de validação da categoria
     */
    public static function getValidationRules($id = null)
    {
        return [
            'empresa_id' => 'required|integer|exists:empresas,id',
            'produto_id' => 'required|integer|exists:produtos,id',
            'user_id' => 'required|integer|exists:users,id',
            'quantidade' => 'required|integer|min:1',
//            'subtotal' => 'required|numeric',
            'cor_id' => 'numeric|nullable|exists:cores,id',
            'tamanho_id' => 'numeric|nullable|exists:tamanhos,id',
            'token' => 'string',
        ];
    }

    /**
     * Mensagens de validação da categoria
     */
    public static function getValidationMessages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'integer' => 'O campo :attribute deve ser um numero!',
            'string' => 'O campo :attribute deve ser do tipo string!',
            'produto_id.exists' => 'O produto deve estar cadastrado e ativo!',
            'empresa_id.exists' => 'A Empresa deve estar cadastrada e ativa no banco de dados!',
            'user_id.exists' => 'O campo user_id deve ser um usuário cadastrado e ativo!',
            'cor_id.exists' => 'A cor deve estar cadastrada e ativa!',
            'tamanho_id.exists' => 'O tamanho deve estar cadastrado e ativo!',
            'min' => 'O mínimo permitido para adicionar ao carrinho é: 1',
        ];
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'produto_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'empresa_id');
    }

    public function size()
    {
        return $this->belongsTo('App\Models\Tamanho', 'tamanho_id');
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color', 'cor_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
