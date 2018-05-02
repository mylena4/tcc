@extends('layouts.app')

@section('content')
<div class="panel-heading"><h2>Fornecedores</h2></div>
    
        <form method="get" class="form-group pull-right row justify-content-end" action="/consulta/forn">
            <div class="col-md-4" id="teste">
            <input name="find" class="form-control" placeholder="Buscar fornecedor por nome, CNPJ ou telefone...">
            </div>
            <input class="btn btn-primary" type="submit" value="Buscar">
        </form>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>CNPJ</th>
                <th>Telefone</th>
            </thead>
            <tbody>
            @foreach($fornecedores as $fornecedor)
                <tr>
                    <td>{{ $fornecedor->id}}</td>
                    <td>{{ $fornecedor->nome }}</td>
                    <td>{{ $fornecedor->endereco }}</td>
                    <td>{{ $fornecedor->cnpj}} </td>
                    <td>{{ $fornecedor->telefone}} </td>
                    <td><a href="/editar/forn/{{$fornecedor->id}}"class="btn btn-primary pull-right">Editar</a></td>
                    <td><a id="deleta_{{$fornecedor->id}}" href="/deletar/forn/{{$fornecedor->id}}" class="btn btn-danger">Deletar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="/cadastro/forn" class="btn btn-success pull-right">Adicionar Fornecedor</a>
        <br>
        <br>
        <br>
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
@endsection