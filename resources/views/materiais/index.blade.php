@extends('layouts.app')

@section('content')
    <div class="panel-heading"><h2>Estoque</h2></div>
    <div class="panel-body">

        <form method="get" class="form-group pull-right row justify-content-end" action="/consulta/mate">
        <div class="col-md-4">
        <input name="find" class="form-control" placeholder="Buscar material por nome ou descrição...">
        </div>
        <input class="btn btn-primary" type="submit" value="Buscar">
        </form>
        
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Fornecedor</th>
            <th>Quantidade</th>
            <th>Preço Unitário</th>
            </thead>
            <tbody>
                
                
            @foreach($materiais as $material)
                <tr>
                    <td>{{ $material->id }}</td>
                    <td>{{ $material->nome }}</td>
                    <td>{{ $material->descricao}}</td>
                    <td>{{ $material->fornecedor->nome}} </td>
                    <td>{{ $material->quantidade}} </td>
                    <td>{{ $material->preco}} </td>
                    <td><a href="editar/mate/{{$material->id}}"class="btn btn-primary pull-right">Editar</a></td>
                    <td><a id="deleta_{{$material->id}}" href="/deletar/mate/{{$material->id}}" class="btn btn-danger">Deletar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="/cadastro/mate" class="btn btn-success pull-right">Adicionar Material</a>
        <br>
        <br>
        <br>
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
@endsection