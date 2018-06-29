<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedoresController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $fornecedores = Fornecedor::all();
        return view('fornecedores.index', compact('fornecedores'));
    }
    
    public function store(Request $request){
        
        $this->validate($request, [
            'nome' => 'required|min:3|unique:fornecedores,nome',
            'endereco' => 'required|min:5',
            'cnpj' => 'required|unique:fornecedores,cnpj',
            'telefone' => 'required|unique:fornecedores',
        ]);
    
        Fornecedor::create([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'cnpj' => $request->cnpj,
            'telefone' => $request->telefone,
        ]);

        \Session::flash('message', 'Fornecedor cadastrado com sucesso!');
        \Session::flash('alert-class', 'bg-success');
        return back();
    }

    public function edit(Request $request, $id) {
        $fornecedor = Fornecedor::find($id);
        $fornecedor->nome = $request->nome;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->telefone = $request->telefone;
        if($fornecedor->save()){
            \Session::flash('message', 'Fornecedor alterado com sucesso!');
            \Session::flash('alert-class', 'bg-success');
            return back();
        }

    }
    
    public function search(Request $request, $find = null) {
        $find = ($find == null) ? $request->find : $find;    
        $fornecedores = Fornecedor::where('nome','like','%'.$find.'%')->orWhere('cnpj','like',$find.'%')->orWhere('telefone','like',$find.'%')->get();            
        if($fornecedores->count() >= 1) {
            \Session::flash('message', '');
            \Session::flash('alert-class', '');
            return view('fornecedores.index', compact('fornecedores'));
        } else {
            $clientes = Fornecedor::all();
            \Session::flash('message', 'Nenhum fornecedor encontrado!');
            \Session::flash('alert-class', 'bg-danger');
            return view('fornecedores.index', compact('fornecedores'));
        }
    }

    public function editview($id) {
        $fornecedor = Fornecedor::find($id);
        return view('fornecedores.create-edit',compact('fornecedor'));
    }

    public function delete(Request $request, $id) {
        $fornecedor = Fornecedor::find($id);
        $fornecedor->delete();


            \Session::flash('message', 'Fornecedor deletado com sucesso!');
            \Session::flash('alert-class', 'bg-success');

        return back();
    }





}
