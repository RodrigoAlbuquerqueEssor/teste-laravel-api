<?php

namespace App\Http\Controllers\Api;

use App\Imovel;
use App\Http\Controllers\Controller;
use App\Repository\ImovelRepository;
use Illuminate\Http\Request;

class EstadoBuscaController extends Controller
{
    private $imovel;

    public function __construct(Imovel $imovel){

        $this->imovel = $imovel;
    }

    public function index(Request $request)
    {
        $repositorio = new ImovelRepository($this->imovel);

        if($request->has('coditions')) {
            $repositorio->selectCoditions($request->get('coditions'));
        }
        
        if($request->has('fields')) {
            $repositorio->selectFilter($request->get('fields'));
        }

        return response()->json([
            'data' => $repositorio->getResult()->paginate(10)
        ]);
    }
}
