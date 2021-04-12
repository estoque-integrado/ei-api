<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'estoque';

    protected $fillable = [
        'sku',
        'valor_venda',
        'valor_promocional',
        'peso',
        'comprimento',
        'largura',
        'altura',
        'dt_inicio_promocao',
        'dt_fim_promocao',
        'produto_id',
        'quantidade',
        'tamanho_id',
        'cor_id',
    ];


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
