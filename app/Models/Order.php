<?php

/**
 * DOC do arquivo
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Storage;

/**
 * Class Order
 */
class Order extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos';

    protected $fillable = [
        'empresa_id',
        'user_id',
        'prazo_entrega',
        'numero',
        'valor',
        'valor_frete',
        'desconto_codigo',
        'desconto_valor',
        'desconto_percentual',
        'endereco_entrega_id',
        'status_id',
        'link_pagamento',
        'status_pagamento',
        'tipo_entrega',
        'metodo_pagamento',
        'parcelas',
        'transacao_id', // Rede ou pagseguro
        'forma_pagamento',
        'codigo_rastreio',
        'nota_fiscal',
    ];

    /**
     * FUNÇÔES
     */

    /**
     * Retorna as regras de validação do pedido
     */
    public static function getValidationRules($id = null)
    {
        return [
//            'valor' => 'required|numeric',
            'desconto_codigo' => 'string|nullable',
            'desconto_valor' => 'string|nullable',
            'desconto_percentual' => 'string|nullable',
            'endereco_entrega_id' => 'integer|exists:enderecos,id',
            'valor_frete' => 'numeric',
            'tipo_entrega' => 'required|string',
            'codigo_rastreio' => 'string|nullable',
            'prazo_entrega' => 'numeric|nullable',
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
            'endereco_entrega_id.exists' => 'O endereço de entrega deve estar cadastrado e ativo no banco de dados!',
            'numeric' => 'O campo :attribute deve ser um número!',
        ];
    }


    public function getCartTotal()
    {
//        return $this->valor + $this->valor_frete + ($this->forma_pagamento === 'boleto' ? 1 : 0);
    }


    public function getStatusPayment()
    {
        $statusPagseguro = array(
            1 => array(
                "code" => 1,
                "name" => "Aguardando pagamento",
                "description" => "o comprador iniciou a transação, mas até o momento o PagSeguro não recebeu nenhuma informação sobre o pagamento."
            ),
            2 => array(
                "code" => 2,
                "name" => "Em análise",
                "description" => "o comprador optou por pagar com um cartão de crédito e o PagSeguro está analisando o risco da transação."
            ),
            3 => array(
                "code" => 3,
                "name" => "Pagamento recebido",
                "description" => "a transação foi paga pelo comprador e o PagSeguro já recebeu uma confirmação da instituição financeira responsável pelo processamento."
            ),
            // O status 4 está retornando a mesma coisa que o status 3 para não exibir a informação ao cliente final
            4 => array(
                "code" => 4,
                "name" => "Pagamento recebido",
                "description" => "a transação foi paga pelo comprador e o PagSeguro já recebeu uma confirmação da instituição financeira responsável pelo processamento."
            ),
            // 4 => array(
            //     "code" => 4,
            //     "name" => "Disponível",
            //     "description" => "a transação foi paga e chegou ao final de seu prazo de liberação sem ter sido retornada e sem que haja nenhuma disputa aberta."
            // ),
            5 => array(
                "code" => 5,
                "name" => "Em disputa",
                "description" => "o comprador, dentro do prazo de liberação da transação, abriu uma disputa."
            ),
            6 => array(
                "code" => 6,
                "name" => "Devolvido",
                "description" => "o valor da transação foi devolvido para o comprador."
            ),
            7 => array(
                "code" => 7,
                "name" => "Cancelado",
                "description" => "a transação foi cancelada sem ter sido finalizada."
            )
        );

        if ($this->metodo_pagamento === 'pagseguro') {
            return array_key_exists($this->status_pagamento, $statusPagseguro) ?
                $statusPagseguro[$this->status_pagamento] :
                $this->status_pagamento;
        } else {
            return array(
                "code" => r,
                "name" => "Não implementado",
                "description" => "Não implementado"
            );
        }
    }

    /**
     *
     * RELAÇÕES
     */
    public function status()
    {
        return $this->belongsTo('App\Models\OrderStatus', 'status_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'empresa_id');
    }

    public function seller()
    {
        return $this->hasOne('App\Models\Seller', 'vendedor_id');
    }

    public function getClientAddress()
    {
        return $this->belongsTo('App\Models\Address', 'endereco_entrega_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\OrderItem', 'pedido_id');
    }
}
