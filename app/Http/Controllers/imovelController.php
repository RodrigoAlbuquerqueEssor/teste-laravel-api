<?php

namespace App\Http\Controllers;
use JWTAuth;
use Illuminate\Http\Request;
use App\data;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class imovelController extends Controller
{

    private $data;
    //protected $user;
    public function __construct(Data $data)
    {
        $this->user = JWTAuth :: parseToken()->authenticate();
        $this->data=$data;
        
    }

    public function Cadastrar(Request $request){
        try{
            $messages = [
               
                'required' => 'preenchimento obrigatório.',
                'logadouro.min'=> 'tamanho inválido de caracteres mínimo 10 caracteres',
                'bairro.max'=> 'tamanho do bairro no máximo 100 caracteres',
                'municipio.max'=> 'tamanho do município no máximo 200 caracteres',
                'estado.max'=> 'tamanho do estado no máximo 2 caracteres',
                'estado.min'=> 'tamanho do estado no mínimo 2 caracteres',
                'proprietario.max'=> 'tamanho do prorpietário no máximo 100 caracteres',
                'proprietario.min'=> 'tamanho do prorpietário no minimo 5 caracteres',
                'cpf.unique'=>'Este cpf já existe no banco de dados',
                'cpf.digits'=>'cpf precisa de exatos 11 caracteres',
                'tipo_imovel.max'=> 'tamanho máximo do campo imóvel 11 caracteres',
                'tipo_imovel.min'=> 'tamanho mínimo do campo imóvel 4 caracteres',
                'cep.regex'=>'cep inválido formato correto é 00000-000 ',
                'tipo_imovel.in'=>'tipo de imóvel é somente casa ou apartamento'
            
            ];
            $valid= Validator::make($request->all(),
            [
                'logadouro'=>'required|min:10|max:200',
                'bairro'=>'required|max:100',
                'municipio'=>'required|max:200',
                'estado'=>'required|min:2|max:2',
                'tipo_imovel'=>['required',Rule::in(['apartamento', 'casa','CASA','APARTAMENTO'])],
                'proprietario'=>'required|min:5|max:100',
                'cep'=>'required|regex:/^[0-9]{5}-[\d]{3}$/',
                'cpf'=>'required|digits:11|unique:data,cpf|cpf'
            ],$messages);

            

            if($valid->fails()){
                return response()->json(['error'=>$valid->errors()],401);
            }
           
                $data= $request->all();
                $status= $this->data->create($data);
            if($status){
                return "imóvel cadastrado com sucesso";
            }else{
                return "erro não foi possível cadastrar";
               
            }
            
            
          
                 
            
            }catch(\Exception $erro){

                return  $erro->getMessage() ;
            }
    }

    public function Consultar($cpf){
        
        $users = DB::table('data')
                ->where('cpf', '=',$cpf)
                ->get();
                echo json_encode($users);
        
    }

    public function Listar(){
        
        $result=data ::all();
        return $result;
    }


    public function Editar(Request $request,$id){
        try{
            
            
            $messages = [
               
                'logadouro.min'=> 'tamanho inválido de caracteres mínimo 10 caracteres',
                'bairro.max'=> 'tamanho do bairro no máximo 100 caracteres',
                'municipio.max'=> 'tamanho do município no máximo 200 caracteres',
                'estado.max'=> 'tamanho do estado no máximo 2 caracteres',
                'estado.min'=> 'tamanho do estado no minimo 2 caracteres',
                'proprietario.max'=> 'tamanho do prorpietário no máximo 100 caracteres',
                'proprietario.min'=> 'tamanho do prorpietário no minimo 5 caracteres',
                'cpf.unique'=>'Este cpf já existe no banco de dados',
                'cpf.digits'=>'cpf precisa de exatos 11 caracteres',
                'tipo_imovel.max'=> 'tamanho máximo do campo imóvel 11 caracteres',
                'tipo_imovel.min'=> 'tamanho minimi do campo imóvel 4 caracteres',
                'cep.regex'=>'cep inválido formato correto é 00000-000 ',
                'tipo_imovel.in'=>'tipo de imovel é somente casa ou apartamento'
            ];
            $valid= Validator::make($request->all(),
            [
                'logadouro'=>'min:10|max:200',
                'bairro'=>'max:100',
                'municipio'=>'max:200',
                'estado'=>'min:2|max:2',
                'tipo_imovel'=>[Rule::in(['apartamento', 'casa','CASA','APARTAMENTO'])],
                'proprietario'=>'min:5|max:100',
                'cep'=>'regex:/^[0-9]{5}-[\d]{3}$/',
                'cpf'=>'digits:11|unique:data,cpf|cpf'
            ],$messages);

            

            if($valid->fails()){
                return response()->json(['error'=>$valid->errors()],401);
            }
                $dados = $request->all();
                $imovel= $this->data->find($id);
                $status= $imovel->update($dados);
            if($status){
                return "dados atualizados com sucesso";
            }else{
                return "erro não foi possível editar";
            
            }
                
            }catch(\Exception $erro){

                 return  $erro->getMessage() ;
            }
    }
}
