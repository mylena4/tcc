@extends('layouts.app')

@section('content')

    <div class="panel-heading col-md-offset-2"><h2>Pedidos</h2></div>
    <div class="panel-body">
                
                <div class="row">
			<div class="col-md-offset-2 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$iniciar}}</div>
							<div class="text-muted">A iniciar</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked brush"><use xlink:href="#stroked-brush"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$andamento}}</div>
							<div class="text-muted">Em andamento</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$concluido}}</div>
							<div class="text-muted">Concluído</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->


<!--
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-blue panel-widget ">
                        <div class="row no-padding">
                            <div class="col-sm-3 col-lg-5 widget-left">
                                <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                            </div>
                            <div class="col-sm-9 col-lg-7 widget-right">
                                <div class="large">{{$total}}</div>
                                <div class="text-muted">Produtos</div>
                            </div>
                        </div>
                    </div>
                </div>-->

    </div>