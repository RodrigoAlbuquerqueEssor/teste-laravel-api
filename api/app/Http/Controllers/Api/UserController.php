<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Api\ApiMessages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{      
    private $user;

    public function __construct(User $user){

        $this->user = $user;
    }
    
    //Listar todos os usuários
    public function index(){

        $user = $this->user->paginate('10');
        return response()->json($user, 200);
    }

    //Cadastrar usuario
    public function store(Request $request){

        $data = $request->all();

        if(!$request->has('password') || !$request->get('password')){

            $message = new ApiMessages("É nessário informar uma senha...");
            return response()->json($message->getMessage(), 401);
        }

        //Validando cpf
        Validator::make($data, [
            'cpf' => 'required|formato_cpf ', 
        ])->validate();

        try{

            $data['password'] = bcrypt($data['password']);

            $user = $this->user->create($data);
            
            return response()->json([
                'data' => [
                    'msg' => 'Usuário cadastrado com sucesso!'
                ]
            ], 200);
        }

        catch(\Exception $e){

            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    //Buscar usuario especifico
    public function show($id){

        try{

            $user = $this->user->findOrFail($id);
            
            return response()->json([
                'data' => $user
            ], 200);
        }

        catch(\Exception $e){

            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    //Alterar dados de usuario
    public function update(Request $request, $id){

        $data = $request->all();

        if($request->has('password') && $request->get('password')){

            $data['password'] = bcrypt($data['password']);
        }

        else{
            unset($data['password']);
        }

        //Validando cpf
        Validator::make($data, [
            'cpf' => 'formato_cpf ', 
        ])->validate();

        try{

            $user = $this->user->findOrFail($id);
            $user->update($data);

            return response()->json([
                'data' => [
                    'msg' => 'Usuário atualizado com sucesso!'
                ]
            ], 200);
        }

        catch(\Exception $e){

            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    //Deletrar usuario
    public function destroy($id){

        try{
            $user = $this->user->findOrFail($id);
            $user->delete();

            return response()->json([
                'data' => [
                    'msg' => 'Usuário removido com sucesso!'
                ]
            ], 200);
        }

        catch(\Exception $e){

            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    //Buscar imoveis do usario a partir do cpf
    public function buscaImoveis(Request $request){

        $data = $request->all();

        //Validando cpf
        Validator::make($data, [
            'cpf' => 'required|formato_cpf ', 
        ])->validate();

        try{
            $user = DB::select("SELECT us.*, im.* FROM users AS us LEFT JOIN imovel AS im ON im.id_usuario = us.id WHERE us.cpf = '".$data['cpf']."'");

            return response()->json([
                'data' => [
                    'msg' => $user
                ]
            ], 200);
        }

        catch(\Exception $e){

            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
