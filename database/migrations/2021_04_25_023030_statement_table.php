<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StatementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas_extrato', function (Blueprint $table) {
            $table->increments('id');

            // Venda
            $table->integer('venda_id')->unsigned();
            $table->foreign('venda_id')->references('id')->on('vendas')->onDelete('cascade')->onUpdate('cascade');

            $table->string('nf')->nullable();
            $table->integer('mes')->unsigned();
            $table->integer('ano')->unsigned();
            $table->float('valor');
            $table->date('data_vencimento');
            $table->date('data_pagamento')->nullable();
            $table->boolean('pago')->default(false);
            $table->float('valor_pago')->nullable();
            $table->string('obs')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas_extrato');
    }
}
