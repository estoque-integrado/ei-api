<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });

        DB::table('tipo_usuarios')->insert([
            ['id' => 1, 'nome' => 'admin', 'descricao' => 'Administrador geral do sistema'],
            ['id' => 2, 'nome' => 'empresa', 'descricao' => 'Empresas do sistema'],
            ['id' => 3, 'nome' => 'financeiro', 'descricao' => 'Usuario com somente do financeiro'],
            ['id' => 4, 'nome' => 'usuario', 'descricao' => 'Usuario final do sistema'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_usuarios');
    }
}
