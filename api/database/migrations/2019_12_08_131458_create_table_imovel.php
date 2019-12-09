<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImovel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovel', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_usuario');

            $table->string('logradouro');
            $table->string('bairro');
            $table->string('municipio');
            $table->string('estado');
            $table->string('cep');
            $table->string('tipo_imovel');

            $table->timestamps();

            //Criando chave estrangeira
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imovel');
    }
}
