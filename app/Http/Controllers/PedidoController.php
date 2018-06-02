<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cliente;
use App\Produto;
use App\Pedido;
use App\Ordem_Pedido;
use App\Estoque;

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
                'desc_prod' => $request->desc[$key],
            ]);   
        }
    }
    
    public function updateestoque(Request $request){
                
        foreach($request->produto as $key => $prod){
            $produto = Produto::find($prod);
            $materiais = DB::table('produto_material')
                ->join('produtos', 'produto_material.prod_id', '=', 'produtos.id')
                ->where('produtos.id', '=', $prod)
                ->join('materiais', 'produto_material.mate_id', '=','materiais.id')
                ->select( 'materiais.id', 'produto_material.qtd_mate', 'materiais.nome')
                ->get();
            
            foreach($materiais as $material){
                $mate = Estoque::find($material->id);
                $novaqtd = $mate->quantidade - ($material->qtd_mate * $request->qtd[$key]);
                if($novaqtd >= 0){
                    $mate->quantidade = $novaqtd; 
                    $mate->save();
                } else {
                    \Session::flash('message', 'O material '.$mate->nome.' está em falta!');
                    \Session::flash('alert-class', 'bg-danger');
                    return back();
                }       
            } 
        }
    }
    
    public function store(Request $request){
        
        
        $this->validate($request, [
            'cliente' => 'required',
            'preco' => 'required',
            'data_ini' => 'required',
            'data_fim' => 'nullable',
            'status' => 'required',
        ]);
      
        
        $pedido = DB::table('pedidos')->insertGetId([
            'clie_id' => $request->cliente,
            'obs' => $request->descricao,
            'val_tot' => $request->preco,
            'data_ini' => $request->data_ini,
            'data_fim' => $request->data_fim,
            'status' => $request->status,
        ]);
            
        PedidoController::saveprodutos($request, $pedido);
        PedidoController::updateestoque($request);
        
      //  \Session::flash('message', 'Pedido cadastrado com sucesso!');
      //  \Session::flash('alert-class', 'bg-success');
      //  return back();

    }
    
    
    public function details(Request $request, $id){
        $produtos = DB::table('ordem_pedido')
                ->join('pedidos', 'ordem_pedido.pedi_id', '=', 'pedidos.id')
                ->where('pedidos.id', '=', $id)
                ->join('produtos', 'ordem_pedido.prod_id', '=', 'produtos.id')
                ->select('produtos.nome', 'ordem_pedido.desc_prod', 'produtos.preco', 'ordem_pedido.qtd_prod')
                ->get();
        $pedido = Pedido::find($id);  
        
        if(isset($produtos)) {
            return view('pedidos.details', compact('pedido','produtos'));
        } else {
            \Session::flash('message', 'Nenhum produto econtrado!');
            \Session::flash('alert-class', 'bg-danger');
            return back();
        }
    } 
    
    
}
