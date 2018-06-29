@extends('layouts.app')

@section('content')
    <div class="panel-heading"><h2>Usuários</h2></div>
 

    <div class="col-md-12">
        <form method="get" class="form-inline" action="/consulta/">
        <input name="find" class="form-control"  placeholder="Nome ou email...">
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
            <th  data-sortable="true">Email</th>
            <th  data-sortable="true">Status</th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td></td>
                    <td>{{$usuario->id}}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->status == 1 ? "Ativado" : "Desativado"}} </td>
                    <td><a href="editar/{{$usuario->id}}"class="btn btn-primary center-block">Editar</a></td>
                    <td>
                        @if($usuario->status == 1)<a href="/status/{{$usuario->id}}" class="btn btn-danger ">Desativar</a> @endif
                        @if($usuario->status == 0)<a href="/status/{{$usuario->id}}" class="btn btn-success">Ativar</a> @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
             <a href="/cadastro" class="btn btn-success pull-right">Adicionar Usuario</a><br>
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