@extends('layouts.app')

@section('content')
    <div class="panel-heading "><h2>Produtos</h2></div>

    <div class="col-md-12">
        <form method="get" class="form-inline" action="/consulta/prod">
        <input name="find" class="form-control"  placeholder="Nome ou descrição...">
        <input class="btn btn-primary" type="submit" value="Buscar">
        </form> 
        <br>
    </div>
    
    <div class="panel-body">
        <table data-toggle="table" data-url="data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="name" data-sort-order="desc">
            <thead>
            <th  data-checkbox="false"></th>
            <th  data-sortable="true">ID</th>
            <th  data-sortable="true">Nome</th>
            <th  data-sortable="true">Descrição</th>
            <th  data-sortable="true">Preço</th>
            <th></th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td></td>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td><a href="/detalhes/prod/{{$produto->id}}"class="btn btn-warning pull-right">Materiais</a></td>
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


        <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/chart.min.js') }}"></script>
	<script src="{{ asset('js/easypiechart.js') }}"></script>
	<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('js/bootstrap-table.js') }}"></script>