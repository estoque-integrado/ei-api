<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = 'estoque2';

    protected $fillable = [
        'produto_id',
        'quantidade',
        'tamanho_id',
        'cor_id',
        'sku',
        'valor',
        'valor_promocional',
        'peso',
        'comprimento',
        'largura',
        'altura',
    ];


    /**
     * FUNÇÔES
     */
    public function getTotalEstoque($produtoID)
    {
        return Estoque::where('produto_id', $produtoID)->sum('quantidade');
    }


    // Cor
    public function cor()
    {
        return $this->belongsTo('App\Models\Cor');
    }

    // Tamanho
    public function tamanho()
    {
        return $this->belongsTo('App\Models\Tamanho');
    }

    // Produto
    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }
}
