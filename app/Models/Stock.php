<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'estoque';

    protected $fillable = [
        'produto_id',
        'sku',
        'valor_venda',
        'valor_promocional',
        'valor_custo',
        'peso',
        'comprimento',
        'diametro',
        'largura',
        'altura',
        'dt_inicio_promocao',
        'dt_fim_promocao',
        'quantidade',
        'tamanho_id',
        'cor_id',
    ];

    /**
     * Regras de validação do estoque
     */
    public static function getValidationRules($id = null)
    {
        return [
            'produto_id' => 'required|integer|exists:produtos,id',
            'valor_promocional' => 'numeric',
            'valor_venda' => 'required|numeric',
            'valor_custo' => 'numeric',
            'peso' => 'integer',
            'comprimento' => 'integer',
            'largura' => 'integer',
            'altura' => 'integer',
            // Estoqque
            'dt_inicio_promocao' => 'date_format:d/m/Y',
            'dt_fim_promocao' => 'date_format:d/m/Y',
            'quantidade' => 'required|integer|min:0',
            'cor_id' => 'integer|exists:cores,id',
            'tamanho_id' => 'integer|exists:tamanhos,id',
        ];
    }

    /**
     * FUNÇÔES
     */
    public function getStockTotal($productID)
    {
        return Stock::where('produto_id', $productID)->sum('quantidade');
    }


    // Cor
    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }

    // Tamanho
    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }

    // Produto
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
