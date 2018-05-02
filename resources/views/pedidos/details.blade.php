@extends('layouts.app')

@section('content')
    <div class="panel-heading"><h2>{{ $pedido->cliente->nome }}</h2></div>
    <div class="panel-body">
        
        <h3 mt-5>Produtos</h3>
        
        <table class="table">
            <thead>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Valor Unitário</th>
            </thead>
            <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->desc_prod }}</td>
                    <td>{{ $produto->qtd_prod }}</td>
                    <td>{{ $produto->preco }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="/pedidos" class="btn btn-success pull-right">Voltar</a>
        <br>
        <br>
        <br>
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
@endsection
