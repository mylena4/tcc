@extends('layouts.app')

@section('content')
    <div class="panel-heading"><h2>Pedidos</h2></div>

    

    <div class="panel-body">
        <table data-toggle="table" data-url="data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="name" data-sort-order="desc">                    <thead>
            <th  data-checkbox="false"></th>
            <th  data-sortable="true">ID</th>
            <th  data-sortable="true">Cliente</th>
            <th  data-sortable="true">Valor total</th>
            <th  data-sortable="true">Data Início</th>
            <th  data-sortable="true">Data Entrega</th>
            <th  data-sortable="true">Observações</th>
            <th  data-sortable="true">Status</th>
            <th></th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td></td>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->cliente->nome }}</td>
                    <td>{{ $pedido->val_tot }}</td>
                    <td>{{ $pedido->data_ini }}</td>
                    <td>{{ $pedido->data_fim }}</td>
                    <td>{{ $pedido->obs }}</td>
                    <td>
                        @if($pedido->status == 1)  A iniciar @endif
                        @if($pedido->status == 2)  Em andamento @endif
                        @if($pedido->status == 3)  Concluído @endif
                    </td>
                    <td><a href="/detalhes/pedi/{{$pedido->id}}"class="btn btn-warning pull-right">Produtos</a></td>
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

        <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/chart.min.js') }}"></script>
	<script src="{{ asset('js/easypiechart.js') }}"></script>
	<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('js/bootstrap-table.js') }}"></script>