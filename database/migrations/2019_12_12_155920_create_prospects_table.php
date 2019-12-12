<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf', 11);
            $table->string('nome', 100);
            $table->string('tipo', 20);
            $table->string('cep', 8);
            $table->string('estado', 2);
            $table->string('municipio', 20);
            $table->string('bairro', 20);
            $table->string('endereco', 110);
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
        Schema::dropIfExists('prospects');
    }
}
