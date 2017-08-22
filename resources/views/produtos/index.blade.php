@extends('layouts.app')

@section('content')
    <div class="panel-heading"><h2>Produtos</h2></div>
    <div class="panel-body">
        {{--<form method="get" class="form-group" action="/consulta/prod">--}}
        {{--<div class="col-md-4">--}}
        {{--<input name="find" class="form-control" placeholder="Buscar produto...">--}}
        {{--</div>--}}
        {{--<input class="btn btn-primary" type="submit" value="Buscar">--}}
        {{--</form>--}}

        <table class="table">
            <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            </thead>
            <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td><a href="/editar/prod/{{$produto->id}}"class="btn btn-primary pull-right">Editar</a></td>
                    <td><a id="deleta_{{$produto->id}}" href="/deletar/prod/{{$produto->id}}" class="btn btn-danger">Deletar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="/cadastro/prod" class="btn btn-success pull-right">Adicionar Produto</a>
        <br>
        <br>
        <br>
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
@endsection