<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Task::class)->create([
            'logradouro'=>'Rua 1',
            'bairro'=>'bairro 1',
            'municipio'=>'municipio 1',
            'estado'=>'estado 1',
            'cep'=>'00000-111',
            'tipo_imovel'=>'casa',
            'nome_prop'=>'CharlieBrown',
            'cpf'=>'000.000.000-11'
        ]);
       factory(App\Task::class)->create([
            'logradouro'=>'Rua 2',
            'bairro'=>'bairro 2',
            'municipio'=>'municipio 2',
            'estado'=>'estado 2',
            'cep'=>'00000-222',
            'tipo_imovel'=>'Apartamento',
            'nome_prop'=>'Zeca Pagodinho',
            'cpf'=>'000.000.000-22'
        ]);
        factory(App\Task::class)->create([
            'logradouro'=>'Rua 3',
            'bairro'=>'bairro 3',
            'municipio'=>'municipio 3',
            'estado'=>'estado 3',
            'cep'=>'00000-333',
            'tipo_imovel'=>'casa',
            'nome_prop'=>'Luke Cage',
            'cpf'=>'000.000.000-33'
        ]);
    }
}
