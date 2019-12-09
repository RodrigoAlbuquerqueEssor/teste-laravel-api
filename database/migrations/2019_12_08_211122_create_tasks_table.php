<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logradouro', 150);
            $table->string('bairro', 50);
            $table->string('municipio', 50);
            $table->string('estado', 50);
            $table->string('cep', 10);
            $table->string('tipo_imovel', 15);
            $table->string('nome_prop', 150);
            $table->string('cpf', 15);
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
        Schema::dropIfExists('tasks');
    }
}
