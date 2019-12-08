<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data extends Model
{

   
    protected $table = 'data' ;


    protected $guarded = [];

    protected  $fillable = [
        'logadouro',
        'municipio',
        'bairro',
        'estado',
        'cep',
        'tipo_imovel',
        'proprietario',
        'cep',
        'cpf'

  ];
 
  
/*
  public $rules =[
    'logadouro'=>'required|min:10|max:200',
    'bairro'=>'required|max:100',
    'municipio'=>'required|max:200',
    'estado'=>'required|min:2|max:2',
    'tipo_imovel'=>'required|min:4|max:11',
    'proprietario'=>'required|min:5|max:100',
    'cep'=>'required|digits:8',
    'cpf'=>'required|digits:11|unique:data,cpf',
    

];
*/
}
