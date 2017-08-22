@extends('layouts.app')

@section('content')
    <div class="panel-heading"><h2>Clientes</h2></div>
    <div class="panel-body">
        {{--<form method="get" class="form-group" action="/consultaclie">--}}
        {{--<div class="col-md-4">--}}
        {{--<input name="find" class="form-control" placeholder="Buscar cliente...">--}}
        {{--</div>--}}
        {{--<input class="btn btn-primary" type="submit" value="Buscar">--}}
        {{--</form>--}}

        <table class="table">
            <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Email</th>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>{{ $cliente->email}} </td>
                    <td><a href="/editar/clie/{{$cliente->id}}"class="btn btn-primary pull-right">Editar</a></td>
                    <td><a id="deleta_{{$cliente->id}}" href="/deletar/clie/{{$cliente->id}}" class="btn btn-danger">Deletar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="/cadastro/clie" class="btn btn-success pull-right">Adicionar Cliente</a>
        <br>
        <br>
        <br>
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
@endsection