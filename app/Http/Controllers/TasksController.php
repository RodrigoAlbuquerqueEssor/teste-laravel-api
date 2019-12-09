<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;


class TasksController extends Controller
{

    public function index()
    {
        return Task::all();
    }

    public function store(Request $request)
    {
        $request->validate([

            'logradouro'=>'required|max:255',
            'bairro'=>'required|max:255',
            'municipio'=>'required|max:255',
            'estado'=>'required|max:255',
            'cep'=>'required|formato_cep',
            'tipo_imovel'=>'required|max:50',
            'nome_prop'=>'required|max:255',
            'cpf'=>'required|cpf'

        ]);

        $task = Task::create([
            'logradouro'=>$request->input('logradouro'),
            'bairro'=>$request->input('bairro'),
            'municipio'=>$request->input('municipio'),
            'estado'=>$request->input('estado'),
            'cep'=>$request->input('cep'),
            'tipo_imovel'=>$request->input('tipo_imovel'),
            'nome_prop'=>$request->input('nome_prop'),
            'cpf'=>$request->input('cpf')
        ]);
     return $task;
    }

    public function show(Task $task){

        return $task;
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'logradouro'=>'required|max:255',
            'bairro'=>'required|max:255',
            'municipio'=>'required|max:255',
            'estado'=>'required|max:255',
            'cep'=>'required|formato_cep',
            'tipo_imovel'=>'required|max:50',
            'nome_prop'=>'required|max:255',
            'cpf'=>'required|cpf'
        ]);

            $task->logradouro = $request->input('logradouro');
            $task->bairro = $request->input('bairro');
            $task->municipio = $request->input('municipio');
            $task->estado = $request->input('estado');
            $task->cep = $request->input('cep');
            $task->tipo_imovel = $request->input('tipo_imovel');
            $task->nome_prop = $request->input('nome_prop');
            $task->cpf = $request->input('cpf');

        $task->save();

            return $task;
    }

    public function delete(Task $task){

        $task->delete();

        return response()->json(['Status'=>"Deletado com sucesso!"]);
    }

}
