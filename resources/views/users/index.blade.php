@extends('layouts.app')

@section('content')
    <div class="panel-heading"><h2>Usuários</h2></div>
    <div class="panel-body">


        <table class="table">
            <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Função</th>
            <th>Status</th>
            </thead>
            <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        @if($usuario->perfil == 1)  Administração @endif
                        @if($usuario->perfil == 2)  Vendas @endif
                        @if($usuario->perfil == 3)  Financeiro @endif
                    </td>
                    <td>{{ $usuario->status == 1 ? "Ativado" : "Desativado"}} </td>
                    <td><a href="editar/{{$usuario->id}}"class="btn btn-primary pull-right">Editar</a></td>
                    <td>
                        @if($usuario->status == 1)<a href="/status/{{$usuario->id}}" class="btn btn-danger pull-right">Desativar</a> @endif
                        @if($usuario->status == 0)<a href="/status/{{$usuario->id}}" class="btn btn-success pull-right">Ativar</a> @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            <a href="/cadastro" class="btn btn-success pull-right">Adicionar Usuario</a>
        <br>
        <br>
        <br>
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
@endsection