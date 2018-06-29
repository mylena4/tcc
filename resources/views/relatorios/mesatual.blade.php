@extends('layouts.app')

@section('content')

<div class="row col-md-offset-2">
			<div class="col-lg-12">
				<h1 class="page-header">Pedidos de {{ $mes[date('n')] }}</h1>
			</div>
		</div><!--/.row-->
                
                <a href="/exportexcel/mesatual" class="btn btn-success pull-right">Excel</a>
                

<div class="row col-md-offset-2">
    
			<div class="col-lg-11">
				
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body easypiechart-panel">
                                                                <h4>A iniciar:</h4>
                                                                <div class="easypiechart" id="easypiechart-red" data-percent="{{ $pi }}" ><span class="percent">{{ $pi }}%</span>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body easypiechart-panel">
                                                                <h4>Em andamento:</h4>
                                                                <div class="easypiechart" id="easypiechart-orange" data-percent="{{ $pa }}" ><span class="percent">{{ $pa }}%</span>
                                                                </div>
                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body easypiechart-panel">
                                                                <h4>Concluídos:</h4>
                                                                <div class="easypiechart" id="easypiechart-teal" data-percent="{{ $pc }}" ><span class="percent">{{ $pc }}%</span>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                    </div>
                    <div class="col-lg-12">
                            <div class="panel panel-default">
					<!--<div class="panel-heading">Pedidos de {{ $mes[date('n')] }}</div>-->
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th  data-checkbox="true" >ID</th>
						        <th  data-sortable="true">ID</th>
						        <th  data-sortable="true">Valor total</th>
                                                        <th data-sortable="true">Data Início</th>
                                                        <th data-sortable="true">Data Entrega</th>
                                                        <th data-sortable="true">Observações</th>
                                                        <th data-sortable="true">Status</th>
						    </tr>
						    </thead>
                                                   <tbody>
                                                    @foreach($pedidos as $pedido)
                                                        <tr>
                                                            <td></td>
                                                            <td>{{ $pedido->id }}</td>
                                                            <td>{{ $pedido->val_tot }}</td>
                                                            <td>{{ $pedido->data_ini }}</td>
                                                            <td>{{ $pedido->data_fim }}</td>
                                                            <td>{{ $pedido->obs }}</td>
                                                            <td>
                                                                @if($pedido->status == 1)  A iniciar @endif
                                                                @if($pedido->status == 2)  Em andamento @endif
                                                                @if($pedido->status == 3)  Concluído @endif
                                                            </td>
                                                            </tr>
                                                    @endforeach
                                                    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	

<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/chart.min.js') }}"></script>
	<script src="{{ asset('js/easypiechart.js') }}"></script>
	<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('js/bootstrap-table.js') }}"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	