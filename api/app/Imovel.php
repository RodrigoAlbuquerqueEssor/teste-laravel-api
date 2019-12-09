<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
	protected $table = 'imovel';

	protected $fillable = [
		'id_usuario', 'logradouro', 'bairro', 
		'municipio', 'estado', 'cep', 'tipo_imovel'
	];

    public function user(){

    	return $this->belongsTo(User::class);
    }
}
