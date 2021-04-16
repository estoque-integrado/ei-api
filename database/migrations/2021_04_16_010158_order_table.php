<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments  ('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('numero')->unsigned()->comment('Numero do pedido');
            $table->float('valor')->unsigned();
            $table->integer('parcelas')->unsigned();

            $table->float('valor_frete')->unsigned()->nullable();
            $table->string('desconto_codigo')->nullable();
            $table->integer('desconto_valor')->nullable();
            $table->boolean('desconto_percentual')->nullable();
            $table->integer('prazo_entrega')->unsigned()->nullable();
            $table->string('tipo_entrega')->nullable();


            // Endereço de entrega
            $table->integer('endereco_entrega_id')->unsigned();

            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('pedido_status')->onUpdate('cascade');

            // Pagseguro
            $table->string('link_pagamento')->nullable()->comment('Apenas para pagamentos por boleto ou débito online.');
            $table->string('status_pagamento')->nullable();
            $table->string('transacao_id')->nullable();
            $table->string('codigo_rastreio')->nullable();
            $table->string('nota_fiscal')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
