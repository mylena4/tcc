<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Produto;
use App\Estoque;
use App\Produto_Material;

class ProdutoController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }
    
    public function createview() {
        $materiais = Estoque::all();
        return view('produtos.create-edit', compact('materiais'));
    }
    
    public function savemateriais(Request $request, $prod_id){        
        
        foreach($request->materiais as $key => $material){
            Produto_Material::create([
                'mate_id' => $material,
                'prod_id' => $prod_id,
                'qtd_mate' => $request->qtd[$key],
            ]);   
        }
    }
    
    public function store(Request $request){

        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required|min:10',
            'preco' => 'required',
        ]);
                 
        $prod_id = DB::table('produtos')->insertGetId([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
        ]);
        
        ProdutoController::savemateriais($request, $prod_id);
        
        \Session::flash('message', 'Produto cadastrado com sucesso!');
        \Session::flash('alert-class', 'bg-success');
        return back();

    }

    public function editmateriais(Request $request, $id){
        
        foreach($request->materiais as $material){
            $material = Estoque::where('id', $material)->first();
            $material->produto()->sync($id); 
            
            Produto_Material::update([
                'mate_id' => $material,
                'prod_id' => $prod_id,
                'qtd_mate' => $request->qtd[$key],
            ]); 
        }
    }
    
    
    public function editview($id) {
        $materiais = Estoque::all();
        $produto = Produto::find($id);
        $prod_mate = DB::table('produto_material')
                ->join('produtos', 'produto_material.prod_id', '=', 'produtos.id')
                ->where('produtos.id', '=', $id)
                ->join('materiais', 'produto_material.mate_id', '=','materiais.id')
                ->select('materiais.id')
                ->get();
        
        return view('produtos.create-edit', compact('materiais', 'prod_mate','produto'));
        
        
    }

    public function edit(Request $request, $id){
        $produto = Produto::find($id);
        
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        
        
        ProdutoController::editmateriais($request, $id);
        
        if($produto->save()) {
            $request->session()->flash('message', 'Produto alterado com sucesso!');
            $request->session()->flash('alert-class', 'bg-success');
        } else {
            $request->session()->flash('message', 'Falha ao alterar produto.');
            $request->session()->flash('alert-class', 'bg-danger');
        }

        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));

    }

    public function details(Request $request, $id){
        $materiais = DB::table('produto_material')
                ->join('produtos', 'produto_material.prod_id', '=', 'produtos.id')
                ->where('produtos.id', '=', $id)
                ->join('materiais', 'produto_material.mate_id', '=','materiais.id')
                ->select('produtos.nome', 'materiais.nome', 'materiais.descricao', 'produto_material.qtd_mate')
                ->get();
        $produto = Produto::find($id);  
        
        if(isset($materiais)) {
            return view('produtos.details', compact('produto','materiais'));
        } else {
            \Session::flash('message', 'Nenhum material econtrado!');
            \Session::flash('alert-class', 'bg-danger');
            return back();
        }
    } 

       

    public function delete(Request $request, $id) {
        $produto = Produto::find($id);
        $produto->delete();

            \Session::flash('message', 'Produto deletado com sucesso!');
            \Session::flash('alert-class', 'bg-success');

        return back();
    }
    
    public function search(Request $request, $find = null) {
        $find = ($find == null) ? $request->find : $find;    
        $produtos = Produto::where('nome','like','%'.$find.'%')->orWhere('descricao','like','%'.$find.'%')->get();            
        if($produtos->count() >= 1) {
            \Session::flash('message', '');
            \Session::flash('alert-class', '');
            return view('produtos.index', compact('produtos'));
        } else {
            $clientes = Produto::all();
            \Session::flash('message', 'Nenhum produto encontrado!');
            \Session::flash('alert-class', 'bg-danger');
            return view('produtos.index', compact('produtos'));
        }
    }
}
