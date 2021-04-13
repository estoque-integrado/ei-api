<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoque', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade')->onUpdate('cascade');

            $table->string('sku', 20)->nullable();
            $table->float('valor_venda');
            $table->float('valor_promocional')->nullable();
            $table->float('valor_custo')->nullable();

            $table->integer('peso')->nullable();
            $table->integer('comprimento')->nullable();
            $table->integer('diametro')->nullable();
            $table->integer('largura')->nullable();
            $table->integer('altura')->nullable();

            // Datas para o preço promocional entrar em vigor
            $table->dateTime('dt_inicio_promocao')->nullable();
            $table->dateTime('dt_fim_promocao')->nullable();

            $table->integer('quantidade')->default(0)->unsigned();
            $table->integer('cor_id')->nullable();
            $table->integer('tamanho_id')->nullable();

            $table->timestamps();
        });

        // relação estoque_cor
//        Schema::create('estoque_cor', function (Blueprint $table) {
//            $table->integer('cor_id')->unsigned();
//            $table->foreign('cor_id')->references('id')->on('cores')->onUpdate('cascade');
//
//            $table->integer('estoque_id')->unsigned();
//            $table->foreign('estoque_id')->references('id')->on('estoque')->onDelete('cascade')->onUpdate('cascade');
//        });
//
//
//        // relação variacao_tamanho
//        Schema::create('estoque_tamanho', function (Blueprint $table) {
//            $table->integer('tamanho_id')->unsigned();
//            $table->foreign('tamanho_id')->references('id')->on('tamanhos')->onUpdate('cascade');
//
//            $table->integer('estoque_id')->unsigned();
//            $table->foreign('estoque_id')->references('id')->on('estoque')->onDelete('cascade')->onUpdate('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estoque_cor');
        Schema::dropIfExists('estoque_tamanho');
        Schema::dropIfExists('estoque');
    }
}
