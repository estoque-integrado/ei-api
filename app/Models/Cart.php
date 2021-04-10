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
        'cor_id',
        'tamanho_id',
        'quantidade',
        'token',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function size()
    {
        return $this->belongsTo('App\Models\Tamanho');
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
