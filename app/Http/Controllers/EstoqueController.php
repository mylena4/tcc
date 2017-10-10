<?php

namespace App\Http\Controllers;

use App\Estoque;
use App\Fornecedor;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $materiais = Estoque::all();
        $fornecedores = Fornecedor::all();
        return view('materiais.index', compact('materiais', 'fornecedores'));
    }


    public function createview() {
        $fornecedores = Fornecedor::all();
        return view('materiais.create-edit', compact('fornecedores'));
    }

    public function store(Request $request) {
        try {
            Estoque::create([
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'preco' => $request->preco,
                'quantidade' => $request->quantidade,
                'forn_id' =>  (int) $request->fornecedor,
            ]);
        } catch(Exception $e) {
            \Session::flash('message', 'Material não cadastrado');
            \Session::flash('alert-class', 'bg-danger');
            return view('materiais.create-edit');
        }

        \Session::flash('message', 'Material cadastrado com sucesso!');
        \Session::flash('alert-class', 'bg-success');
        return back();
    }

    public function edit(Request $request, $id) {
        $material = Estoque::find($id);
        $material->nome = $request->nome;
        $material->descricao = $request->descricao;
        $material->preco = $request->preco;

        $material->quantidade = $request->quantidade;
        if($material->save()) {
            \Session::flash('message', 'Material alterado com sucesso!');
            \Session::flash('alert-class', 'bg-success');
        } else  {
            \Session::flash('message', 'Falha ao alterar material!');
            \Session::flash('alert-class', 'bg-danger');
        }

        $fornecedores = Fornecedor::all();
        return view('materiais.create-edit', compact('fornecedores', 'material'));
    }

    public function search(Request $request) {

        if($request->fornecedor == -1 || !isset($request->fornecedor))
            $materiais = Estoque::where('nome','like', $request->find.'%')->get();
        else $materiais = Estoque::where('forn_id','=', $request->fornecedor)->get();

        $fornecedores = Fornecedor::all();
        if($materiais->count() >= 1) {
            return view('materiais.index', compact('materiais', 'fornecedores'));
        }
    }

    public function editview($id) {
        $material = Estoque::find($id);
        $fornecedores = Fornecedor::all();
        return view('materiais.create-edit', compact('material', 'fornecedores'));
    }

    public function delete(Request $request, $id) {
        $material = Estoque::find($id);
        $material->delete();


        \Session::flash('message', 'Material deletado com sucesso!');
        \Session::flash('alert-class', 'bg-success');

        return back();
    }
}
