<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function store(Request $request){


        $this->validate($request, [
            'nome' => 'required|min:10',
            'telefone' => 'required|min:8|unique:clientes,telefone',
            'endereco' => 'required|min:6',
            'email' => 'required|min:7|unique:clientes,email',
        ]);

        Cliente::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'email' => $request->email,
        ]);

        \Session::flash('message', 'Cliente cadastrado com sucesso!');
        \Session::flash('alert-class', 'bg-success');
        return back();

    }




    public function editview($id) {
        $cliente = Cliente::find($id);
        return view('clientes.create-edit', compact('cliente'));
    }

    public function edit(Request $request, $id){
        $cliente = Cliente::find($id);
        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->endereco = $request->endereco;
        $cliente->email = $request->email;

        if($cliente->save()) {
            $request->session()->flash('message', 'Cliente alterado com sucesso');
            $request->session()->flash('alert-class', 'bg-success');
        } else {
            $request->session()->flash('message', 'Falha ao alterar cliente!');
            $request->session()->flash('alert-class', 'bg-danger');
        }


        return view('clientes.create-edit', compact('cliente'));

    }

    public function editstatus($id){
        $cliente = Cliente::find($id);

        if($cliente->status == 0){
            $cliente->status = 1;
        } else {
            $cliente->status = 0;
        }

        if($cliente->save()) {
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
        $cliente = Cliente::find($id);
        $cliente->delete();


            \Session::flash('message', 'Cliente deletado com sucesso!');
            \Session::flash('alert-class', 'bg-success');

        return back();
    }
}
