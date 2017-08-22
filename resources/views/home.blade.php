@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            @if(Auth::user()->perfil == 1)
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
                </div>
            @endif



        </div><!--/.row-->
    </div>