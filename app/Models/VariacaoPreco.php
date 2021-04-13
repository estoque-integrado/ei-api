<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariacaoPreco extends Model
{
    protected $table = 'variacao_precos';

    protected $fillable = [
        'sku',
        'valor_custo',
        'valor_venda',
        'valor_promocional',
        'peso',
        'comprimento',
        'largura',
        'altura',
        'dt_inicio_promocao',
        'dt_fim_promocao',
        'produto_id',
        'dt_inicio_promocao',
        'dt_fim_promocao',
    ];

    /**
     * Funções
     */
    public function getArrayTamanhos()
    {
        return $this->tamanhos()->pluck('tamanho_id')->toArray();
    }

    /**
     * Relações
     */

    // Produto
    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }

    // Cor
    public function cores()
    {
        return $this->belongsToMany('App\Models\Cor', 'variacao_cor', 'variacao_id', 'cor_id');
    }

    // Tamanho
    public function tamanhos()
    {
        return $this->belongsToMany('App\Models\Tamanho', 'variacao_tamanho', 'variacao_id', 'tamanho_id');
    }
}
