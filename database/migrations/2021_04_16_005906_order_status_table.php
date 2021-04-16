<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class OrderStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->timestamps();
        });


        DB::insert('insert into pedido_status (nome) values (?)', ['Aguardando Pagamento']);
        DB::insert('insert into pedido_status (nome) values (?)', ['Recebido']);
        DB::insert('insert into pedido_status (nome) values (?)', ['Aprovado']);
        DB::insert('insert into pedido_status (nome) values (?)', ['Processando']);
        DB::insert('insert into pedido_status (nome) values (?)', ['Enviado']);
        DB::insert('insert into pedido_status (nome) values (?)', ['Concluído']);
        DB::insert('insert into pedido_status (nome) values (?)', ['Cancelado']);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_status');
    }
}
