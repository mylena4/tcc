<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    
    public function saveprodutos(Request $request, $id_ped){
                
        foreach($request->produto as $key => $prod){
            Ordem_Pedido::create([
                'pedi_id' => $id_ped,
                'prod_id' => $prod,
                'qtd_prod' => $request->qtd[$key],
            ]);   
        }
 
    }
    
    
    public function store(Request $request){
        
        
        $this->validate($request, [
            'cliente' => 'required',
            'descricao' => 'required',
            'preco' => 'required',
        ]);
      
        
        $pedido = DB::table('pedidos')->insertGetId([
            'clie_id' => $request->cliente,
            'obs' => $request->descricao,
            'val_tot' => $request->preco,
        ]);
            
        PedidoController::saveprodutos($request, $pedido);
        
        \Session::flash('message', 'Pedido cadastrado com sucesso!');
        \Session::flash('alert-class', 'bg-success');
        return back();

    }
}
