<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinho', function (Blueprint $table) {
            $table->increments('id');

            // Relação Produto
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos')
                ->onDelete('cascade')->onUpdate('cascade');

            // Relação Empresa
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')
                ->onDelete('cascade')->onUpdate('cascade');

            // Relação user
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            // Relação cor
            $table->integer('cor_id')->unsigned()->nullable();
            $table->foreign('cor_id')->references('id')->on('cores')
                ->onUpdate('cascade');

            // Relação tamanho
            $table->integer('tamanho_id')->unsigned()->nullable();
            $table->foreign('tamanho_id')->references('id')->on('tamanhos')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('quantidade')->unsigned();
            $table->float('valor_produto')->unsigned();
            $table->float('subtotal')->unsigned();
            $table->string('token', 150)->nullable();

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
        Schema::dropIfExists('carrinho');
    }
}
