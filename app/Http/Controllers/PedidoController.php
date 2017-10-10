<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Produto;
use App\Pedido;
use App\Ordem_Pedido;

class PedidoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }
    
    public function createview(){
        $produtos = Produto::all();
        $clientes = Cliente::all();
        return view('pedidos.create-edit', compact('produtos','clientes'));
    }
    
    public function saveprodutos(Request $request){
        
        foreach($request->produtos as $produto){
            
            Produto_Material::create([
                'mate_id' => $material,
                'prod_id' => Produto::where('nome', $request->nome)->get()->id,
            ]);
            
        }
 
    }
    
}
