@extends('layouts.app')

@section('content')
    <div class="panel-heading"><h2>Pedidos</h2></div>
    <div class="panel-body">

        <table class="table">
            <thead>
            <th>ID</th>
            <th>Cliente</th>
            <th>Valor total</th>
            </thead>
            <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->cliente->nome }}</td>
                    <td>{{ $pedido->val_tot }}</td>
                    <td><a href="/editar/pedi/{{$pedido->id}}"class="btn btn-primary pull-right">Editar</a></td>
                    <td><a id="deleta_{{$pedido->id}}" href="/deletar/pedi/{{$pedido->id}}" class="btn btn-danger">Deletar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="/cadastro/pedi" class="btn btn-success pull-right">Adicionar Pedido</a>
        <br>
        <br>
        <br>
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
@endsection