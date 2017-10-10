@extends('layouts.app')

@section('content')
    <div class="panel-heading"><h2>{{ $produto->nome }}</h2></div>
    <div class="panel-body">
        
        <h3 mt-5>Materiais</h3>
        
        <table class="table">
            <thead>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            </thead>
            <tbody>
            @foreach($materiais as $material)
                <tr>
                    <td>{{ $material->nome }}</td>
                    <td>{{ $material->descricao }}</td>
                    <th>{{ $material->quantidade }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="/produtos" class="btn btn-success pull-right">Voltar</a>
        <br>
        <br>
        <br>
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
@endsection
