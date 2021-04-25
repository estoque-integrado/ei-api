<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Classe responsável pelas vendas presenciais
 *
 * @author Ronierison Sena
 */
class Sale extends Model
{
    use SoftDeletes;

    protected $table = 'vendas';

    const __DISCOUNT__ = 'desconto';
    const __FEE__ = 'juros';

    /**
     * Formas de pagamento:
     * 1 - Dinheiro
     * 2 - Cartão Credito
     * 3 - Cartão Debito
     * 4 - Crediário
     * 5 - Cheque
     */
    const PAYMENT_CASH = 'dinheiro';
    const PAYMENT_CREDIT = 'cartao credito';
    const PAYMENT_DEBIT = 'cartao debito';
    const PAYMENT_CREDITOR = 'crediario';
    const PAYMENT_CHECK = 'cheque';


    protected $fillable = [
        'user_id', // ID do cliente (se houver)
        'empresa_id',
        'vendedor_id',
        'forma_pagamento',
        'subtotal', // subtotal sem desconto ou juros
        'total',
        'entrada',
        'parcelas',
        'desconto_juros', // String desconto|juros
        'desconto_percentual', // 1 = desconto aplicado em percentual (%) | 0 = desconto em R$
        'desconto_juros_valor',
        'nome',
    ];


    /**
     * Regras de validação do produto
     */
    public static function getValidationRules($id = null)
    {
        return [
            'vendedor_id' => 'integer|exists:vendedores,id',
            'forma_pagamento' => ['required','integer'],
            'entrada' => 'numeric',
            'parcelas' => 'numeric|min:1',
            'desconto_juros' => ['required_with:desconto_juros_valor','string','regex:/(desconto|juros)/'],
            'desconto_percentual' => 'required_with:desconto_juros_valor|boolean',
            'desconto_juros_valor' => 'numeric',
            'nome' => 'string',
            'produtos' => 'required|array',
            'produtos.*.id' => 'required|exists:produtos,id|integer',
            'produtos.*.quantidade' => 'integer|required|min:1',
            'produtos.*.cor_id' => 'integer|exists:cores,id',
            'produtos.*.tamanho_id' => 'integer|exists:tamanhos,id',
        ];
    }


    /**
     * Mensagens de validação do produto
     *
     */
    public static function getValidationMessages()
    {
        return [
            'forma_pagamento.integer' => 'Formas de pagamento deve ser um número! 1 - Dinheiro| 2 - cartao_credito| 3 - cartao_debito| 4 - crediario | 5 - cheque',
            'required' => 'O campo :attribute é obrigatório!',
            'max' => 'O campo :attribute deve conter no máximo 15 caracteres!',
            'integer' => 'O campo :attribute deve ser um numero!',
            'string' => 'O campo :attribute deve ser do tipo string!',
            'boolean' => 'O campo :attribute deve ser do tipo boolean!',
            'numeric' => 'O campo :attribute deve ser um numero com 2 casas decimais! Ex: 1500.00',
            'vendedor_id.exists' => 'O vendedor deve estar cadastrado e ativo no banco de dados!',
            'forma_pagamento.regex' => 'A forma de pagamento deve ser uma das opções: dinheiro|cartao_credito|cartao_debito|crediario|cheque',
            'desconto_juros.regex' => 'Valores aceitos: desconto|juros',
            'desconto_percentual.required_with' => 'Se houver valor de desconto, deve ser informado se é em percentual (1) ou em reais (2)',
            'desconto_juros.required_with' => 'Se houver valor de desconto, deve ser informado se é desconto ou juros!',
            'array' => 'O campo produtos é obrigatório e deve ser um array de produtos válidos!',
            'produtos.*.quantidade' => 'A quantidade é obrigatória!',
            'produtos.*.quantidade.min' => 'A quantidade mínima de cada produto é 1!',
            'produtos.*.cor_id' => 'A cor deve estar cadastrada e ativa no banco de dados!',
            'produtos.*.tamanho_id.exists' => 'O tamanho deve estar cadastrado e ativo no banco de dados!',
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'empresa_id');
    }

    public function statements()
    {
        return $this->hasMany('App\Models\Statement', 'venda_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'venda_produtos', 'venda_id', 'produto_id')->as('detalhes')->withPivot('quantidade', 'tamanho_id', 'cor_id', 'valor');
    }

    public function seller()
    {
        return $this->belongsTo('App\Models\Seller', 'vendedor_id');
    }
}
