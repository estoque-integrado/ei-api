<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');

            // User
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('vendedor_id')->unsigned()->nullable();
            $table->foreign('vendedor_id')->references('id')->on('vendedores')->onUpdate('cascade');

            $table->integer('cliente')->unsigned()->nullable();

            // Empresa
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('forma_pagamento')->unsigned()->comment('1-Dinheiro|2-cartaoCredito|3-cartaoDebito|4-crediario|5-cheque');

            $table->float('subtotal');
            $table->float('total')->comment('valor - entrada - desconto');
            $table->float('entrada')->nullable();

            $table->integer('parcelas')->unsigned()->comment('quantidade parcelas');

            // Desconto
            $table->float('desconto_juros_valor')->nullable();
            $table->string('desconto_juros')->nullable()->comment('valores-validos:desconto|juros');
            $table->boolean('desconto_percentual')->nullable()->comment('percentual=true|real=false');


            $table->timestamps();
            $table->softDeletes();
        });

        // Cria a relação com os produtos
        Schema::create('venda_produtos', function (Blueprint $table) {
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('venda_id')->unsigned();
            $table->foreign('venda_id')->references('id')->on('vendas')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('quantidade')->unsigned();
            $table->integer('tamanho_id')->unsigned();
            $table->integer('cor_id')->unsigned();
            $table->float('valor')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venda_produtos');
        Schema::dropIfExists('vendas');
    }
}
