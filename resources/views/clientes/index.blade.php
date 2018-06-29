@extends('layouts.app')

@section('content')
    <div class="panel-heading"><h2>Clientes</h2></div>
    
    <div class="col-md-12">
        <form method="get" class="form-inline" action="/consulta/clie">
        <input name="find" class="form-control"  placeholder="Nome, telefone ou email...">
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
                <th  data-sortable="true">Telefone</th>
                <th  data-sortable="true">Endereço</th>
                <th  data-sortable="true">Email</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td></td>
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

        <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/chart.min.js') }}"></script>
	<script src="{{ asset('js/easypiechart.js') }}"></script>
	<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('js/bootstrap-table.js') }}"></script>