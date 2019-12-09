<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use App\Http\Requests\ImovelRequest;
use App\Imovel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImovelController extends Controller
{

	private $imovel;

    public function __construct(Imovel $imovel){

    	$this->imovel = $imovel;
    }

    public function index(){

        $imovel = auth('api')->user()->imoveis();
    
    	return response()->json($imovel->paginate(10), 200); 
    }

    public function show($id){

    	try{

    		$imovel = auth('api')->user()->imoveis()->findOrFail($id);
    		
    		return response()->json([
    			'data' => $imovel
    		], 200);
    	}

    	catch(\Exception $e){

    		$message = new ApiMessages($e->getMessage());
    		return response()->json($message->getMessage(), 401);
    	}
    }

    public function store(ImovelRequest $request){

        $data = $request->all();

        //Validando cep
        Validator::make($data, [
            'cep' => 'required|formato_cep', 
        ])->validate(); 


    	try{

            $data['id_usuario'] = auth('api')->user()->id;
    		$imovel = $this->imovel->create($data);

    		return response()->json([
    			'data' => [
    				'msg' => 'Imóvel cadastrado com sucesso!'
    			]
    		], 200);
    	}

    	catch(\Exception $e){

    		$message = new ApiMessages($e->getMessage());
    		return response()->json($message->getMessage(), 401);
    	}
    }	

    public function update($id, ImovelRequest $request){

    	$data = $request->all();

    	try{

    		$imovel = auth('api')->user()->imoveis()->findOrFail($id);
    		$imovel->update($data);

    		return response()->json([
    			'data' => [
    				'msg' => 'Imóvel atualizado com sucesso!'
    			]
    		], 200);
    	}

    	catch(\Exception $e){

    		$message = new ApiMessages($e->getMessage());
    		return response()->json($message->getMessage(), 401);
    	}
    }

    public function destroy($id){

    	try{

    		//Mass Asignment
    		$imovel = auth('api')->user()->imoveis()->findOrFail($id);
    		$imovel->delete();

    		return response()->json([
    			'data' => [
    				'msg' => 'Imóvel removido com sucesso!'
    			]
    		], 200);
    	}

    	catch(\Exception $e){

    		$message = new ApiMessages($e->getMessage());
    		return response()->json($message->getMessage(), 401);
    	}
    } 
}

