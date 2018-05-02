<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class UserController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $usuarios = User::all();
        return view('users.index', compact('usuarios'));
    }

    public function store(Request $request){

            if(Auth::user()->perfil == 1) {
                $this->validate($request, [
                    'name' => 'required|min:5',
                    'email' => 'required|min:7|unique:users,email',
                    'password' => 'required|min:6',
                    'perfil' => 'required',
                ]);

                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'perfil' => $request->perfil,
                    'status' => 1,
                ]);

                \Session::flash('message', 'Usuário cadastrado com sucesso!');
                \Session::flash('alert-class', 'bg-success');
                return back();

            } else {
                \Session::flash('message', 'Falha ao cadastrar usuário!');
                \Session::flash('alert-class', 'bg-danger');
                return back();
            }
    }


    public function editview($id) {
        $usuario = User::find($id);
        return view('users.create-edit', compact('usuario'));
    }

    public function edit(Request $request, $id){
        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = $request->password == '' ? $usuario->password : bcrypt($request->password);
        $usuario->perfil = $request->perfil;
        $usuario->status = !isset($request->status) ? $usuario->status : $request->status;

        if($usuario->save()) {
            $request->session()->flash('message', 'Usuário alterado com sucesso');
            $request->session()->flash('alert-class', 'bg-success');
        } else {
            $request->session()->flash('message', 'Falha ao alterar usuário!');
            $request->session()->flash('alert-class', 'bg-danger');
        }


        return view('users.create-edit', compact('usuario'));

    }

    public function editstatus($id){
        $usuario = User::find($id);

        if($usuario->status == 0){
            $usuario->status = 1;
        } else {
            $usuario->status = 0;
        }

        if($usuario->save()) {
            \Session::flash('message', 'Status alterado com sucesso!');
            \Session::flash('alert-class', 'bg-success');
            return back();
        } else {
            \Session::flash('message', 'Falha ao alterar status!');
            \Session::flash('alert-class', 'bg-danger');
            return back();
        }

    }

    public function search(Request $request, $find = null) {
        $find = ($find == null) ? $request->find : $find;    
        $usuarios = User::where('name','like','%'.$find.'%')->orWhere('email','like',$find.'%')->get();            
        if($usuarios->count() >= 1) {
            return view('users.index', compact('usuarios'));
        } else {
            $usuarios = User::all();
            \Session::flash('message', 'Nenhum usuário encontrado!');
            \Session::flash('alert-class', 'bg-danger');
            return view('users.index', compact('usuarios'));
        }
    }

}
