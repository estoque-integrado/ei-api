<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Classe responsável pelo extrato das empresas
 * Todas as movimentações mês a mês
 *
 * @author Ronierison Sena
 */
class Statement extends Model
{
    use SoftDeletes;

    protected $table = 'vendas_extrato';

    protected $fillable = [
        'venda_id',
        'nf',
        'mes',
        'ano',
        'valor',
        'data_vencimento',
        'data_pagamento',
        'pago',
        'valor_pago',
        'obs',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function sale()
    {
        return $this->belongsTo('App\Models\Sale', 'venda_id');
    }
}
