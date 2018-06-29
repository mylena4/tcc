@extends('layouts.app')

@section('content')


<div class="row col-md-offset-2">
			<div class="col-lg-12">
				<h1 class="page-header">Pedidos do Ano</h1>
			</div>
		</div><!--/.row-->
                
                <a href="/exportexcel/ano" class="btn btn-success pull-right">Excel</a>
                

<div class="row col-md-offset-2">
    
			<div class="col-lg-9">
				
                                <div id="myfirstchart" ></div>
                                        
                        </div>
                    <div class="col-lg-12">
                            <div class="panel panel-default">
					<!--<div class="panel-heading">Pedidos de {{ $mes[date('n')] }}</div>-->
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
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

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        
        <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/chart.min.js') }}"></script>
	<script src="{{ asset('js/easypiechart.js') }}"></script>
	<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('js/bootstrap-table.js') }}"></script>
        
        
        <script type="text/javascript">
           let data;
    
            axios.get('/pedidos_json')
                .then(function (response) {
                    
                    data = response.data;
                    
                    console.log(data);
                    console.log(data[1].data_fim)
                    console.log(data[1].val_tot)
                })
                .catch(function (error) {
                  console.log(error);
                });
                
                
                Morris.Line({
                    // ID of the element in which to draw the chart.
                    element: 'myfirstchart',
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.
                    data: [
                        { y: '2006', a: 100, b: 90 },
                        { y: '2007', a: 75,  b: 65 },
                        { y: '2008', a: 50,  b: 40 },
                        { y: '2009', a: 75,  b: 65 },
                        { y: '2010', a: 50,  b: 40 },
                        { y: '2011', a: 75,  b: 65 },
                        { y: '2012', a: 100, b: 90 }
                        
//                      {year: data[1].data_fim},
//                          {value: data[1].val_tot}
//                          response.data.map((year, value) {
//                                { year: data.data_fim }
//                            })
                    ],
                    
                    // The name of the data record attribute that contains x-values.
                    xkey: 'year',
                        // A list of names of data record attributes that contain y-values.
                    ykeys: ['value'],
                        // Labels for the ykeys -- will be displayed when you hover over the
                        // chart.
                    labels: ['Value']
                })
        </script>

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