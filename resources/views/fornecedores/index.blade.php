@extends('layouts.app')

@section('content')
<div class="panel-heading"><h2>Fornecedores</h2></div>

    <div class="col-md-12">
        <form method="get" class="form-inline" action="/consulta/forn">
        <input name="find" class="form-control"  placeholder="Nome, CNPJ ou telefone...">
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
                <th  data-sortable="true">Endereço</th>
                <th  data-sortable="true">CNPJ</th>
                <th  data-sortable="true">Telefone</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            @foreach($fornecedores as $fornecedor)
                <tr>
                    <td></td>
                    <td>{{ $fornecedor->id }}</td>
                    <td>{{ $fornecedor->nome }}</td>
                    <td>{{ $fornecedor->endereco }}</td>
                    <td>{{ $fornecedor->cnpj}} </td>
                    <td>{{ $fornecedor->telefone}} </td>
                    <td><a href="/editar/forn/{{$fornecedor->id}}"class="btn btn-primary center-block">Editar</a></td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Deletar</button></td>
                </tr>
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja apagar o fornecedor?{{$fornecedor->id}}</h5>
                          </div>
                          <div class="modal-footer">

                            <a id="deleta_{{$fornecedor->id}}" href="/deletar/forn/{{$fornecedor->id}}" class="btn btn-primary">Sim</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                          </div>
                        </div>
                      </div>
                    </div>
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

<!-- Button trigger modal -->


<!-- Modal -->



@endsection

        <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/chart.min.js') }}"></script>
	<script src="{{ asset('js/easypiechart.js') }}"></script>
	<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('js/bootstrap-table.js') }}"></script>
