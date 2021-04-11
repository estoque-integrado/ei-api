<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments  ('id');

            // Empresa
            $table->integer     ('empresa_id')  ->unsigned();
            $table->foreign     ('empresa_id')  ->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');

            // Categoria
            $table->integer     ('categoria_id')  ->unsigned();
            $table->foreign     ('categoria_id')  ->references('id')->on('categorias')->onUpdate('cascade');

            $table->string      ('nome');
            $table->string      ('slug');
            $table->string      ('sku');

            $table->string      ('descricao_curta', 255)->nullable();
            $table->longText    ('descricao_completa')  ->nullable();

            // Preços
            $table->float       ('preco_custo', 8, 2)   ->nullable();
            $table->float       ('preco_venda', 8, 2);
            $table->float       ('preco_promocional', 8, 2)->nullable();

            // Detalhes entrega
            $table->float       ('peso')  ->nullable();
            $table->float       ('altura')  ->nullable();
            $table->float       ('largura')  ->nullable();
            $table->float       ('diametro')  ->nullable();
            $table->float       ('comprimento')  ->nullable();

            $table->string      ('titulo_seo')          ->nullable();
            $table->string      ('descricao_seo')       ->nullable();
            $table->string      ('tags_seo')            ->nullable();
            $table->boolean     ('status')              ->nullable();
            $table->boolean     ('destaque')            ->default(false);
            $table->boolean     ('ativo')               ->default(true);

            $table->timestamps();
            $table->softdeletes();
        });

        Schema::create('produto_tamanhos', function (Blueprint $table) {
            $table->integer('tamanho_id')->unsigned();
            $table->foreign('tamanho_id')->references('id')->on('tamanhos')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_tamanhos');
        Schema::dropIfExists('produtos');
    }
}
