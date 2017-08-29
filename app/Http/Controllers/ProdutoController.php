<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Estoque;
use App\Produto_Material;

class ProdutoController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $produtos = Produto::all();
        $materiais = Estoque::all();
        return view('produtos.index', compact('produtos', 'materiais'));
    }
    
     public function createview() {
        $materiais = Estoque::all();
        return view('produtos.create-edit', compact('materiais'));
    }
    
    public function savemateriais(Request $request){
        
        foreach($request->materiais as $material){
            
            Produto_Material::create([
                'mate_id' => $material,
                'prod_id' => Produto::where('nome', $request->nome)->get()->id,
            ]);
            
        }
 
    }

    public function store(Request $request){

        
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required|min:10',
            'preco' => 'required',
        ]);

        Produto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
        ]);
            
        ProdutoController::savemateriais($request);
        
        \Session::flash('message', 'Produto cadastrado com sucesso!');
        \Session::flash('alert-class', 'bg-success');
        return back();

    }




    public function editview($id) {
        $produto = Produto::find($id);
        $materiais = Estoque::all();
        return view('produtos.create-edit', compact('materiais', 'produto'));
    }

    public function edit(Request $request, $id){
        $produto = Produto::find($id);
        
        $produto->nome = $request->nome;
        $produto->telefone = $request->telefone;
        $produto->endereco = $request->endereco;
        $produto->email = $request->email;

        if($produto->save()) {
            $request->session()->flash('message', 'Produto alterado com sucesso');
            $request->session()->flash('alert-class', 'bg-success');
        } else {
            $request->session()->flash('message', 'Falha ao alterar produto!');
            $request->session()->flash('alert-class', 'bg-danger');
        }


        return view('produtos.create-edit', compact('produto'));

    }

    public function editstatus($id){
        $produto = Produto::find($id);

        if($produto->status == 0){
            $produto->status = 1;
        } else {
            $produto->status = 0;
        }

        if($produto->save()) {
            \Session::flash('message', 'Status alterado com sucesso!');
            \Session::flash('alert-class', 'bg-success');
            return back();
        } else {
            \Session::flash('message', 'Falha ao alterar status!');
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
}
