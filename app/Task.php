<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table='tasks';
    protected $fillable = ['logradouro','bairro','municipio','estado','cep','tipo_imovel','nome_prop','cpf'];
}
