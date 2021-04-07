<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('rg', 20)->unique()->nullable();
            $table->string('cpf', 20)->unique();
            $table->string('celular', 20)->nullable();
            $table->integer('endereco_id')->nullable();
            $table->integer('tipo_usuario_id')->unsigned()->default(4);
            $table->boolean('ativo')->default(true);
            $table->boolean('bloqueado')->default(false);
            $table->string('last_login')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
