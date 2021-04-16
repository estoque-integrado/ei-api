<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'pedido_itens';

    protected $fillable = [
        'produto_id',
        'pedido_id',
        'quantidade',
        'valor',
        'tamanho_id',
        'cor_id',
    ];


    public function order()
    {
        return $this->belongsTo('App\Models\Order')->withTrashed();
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product')->withTrashed();
    }

    public function sizes()
    {
        return $this->belongsTo('App\Models\Size')->withTrashed();
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color')->withTrashed();
    }
}
