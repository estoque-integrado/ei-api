<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer     ('user_id')->unsigned()->comment('DONO da empresa');
            $table->foreign     ('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->string      ('nome', 255);
            $table->string      ('telefone', 20)     ->nullable();
            $table->string      ('celular', 20)      ->nullable();
            $table->string      ('slug', 100)        ->nullable();
            $table->string      ('razao_social', 80) ->nullable();
            $table->string      ('website', 80)      ->nullable();
            $table->string      ('cnpj', 20)         ->unique();
            $table->string      ('logo')             ->nullable()->comment('Logo da empresa');
            $table->string      ('logo_branca')      ->nullable();
            $table->string      ('icone')            ->nullable();
            $table->boolean     ('matriz')           ->default(true);
            $table->boolean     ('ativo')            ->default(true);
            $table->boolean     ('bloqueado')        ->default(false)->comment('Bloqueio da empresa por falta de pagamento, etc.');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('empresa_user', function(Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')
                ->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa_user');
        Schema::dropIfExists('empresas');
    }
}
