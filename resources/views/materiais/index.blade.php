@extends('layouts.app')

@section('content')
    <div class="panel-heading"><h2>Estoque</h2></div>


    <div class="col-md-12">
        <form method="get" class="form-inline" action="/consulta/mate">
        <input name="find" class="form-control"  placeholder="Nome ou descrição...">
        <input class="btn btn-primary" type="submit" value="Buscar">
        </form> 
        <br>
    </div>

    <div class="panel-body">    
        
        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="name" data-sort-order="desc">
            
            <thead>
            <th  data-checkbox="false"></th>
            <th  data-sortable="true">ID</th>
            <th  data-sortable="true">Nome</th>
            <th  data-sortable="true">Descrição</th>
            <th  data-sortable="true">Fornecedor</th>
            <th  data-sortable="true">Quantidade</th>
            <th  data-sortable="true">Preço Unitário</th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
                
                
            @foreach($materiais as $material)
                <tr>
                    <td></td>
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


        <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/chart.min.js') }}"></script>
	<script src="{{ asset('js/easypiechart.js') }}"></script>
	<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('js/bootstrap-table.js') }}"></script>