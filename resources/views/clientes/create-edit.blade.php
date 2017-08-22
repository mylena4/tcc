@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Request::is('cadastro/clie') ? 'Cadastrar Cliente' : 'Editar Cliente' }}</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="@if(Request::is('cadastro/clie')) /salvar/clie @else /editar/clie/{{$cliente->id}} @endif">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ isset($cliente) ? $cliente->nome : '' }}" placeholder="" required autofocus>

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                            <label for="endereco" class="col-md-4 control-label">Endereço</label>

                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control" name="endereco" value="{{ isset($cliente) ? $cliente->endereco : ''}}" placeholder="" required autofocus>

                                @if ($errors->has('endereco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                            <label for="cnpj" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control" name="telefone" value="{{  isset($cliente) ? $cliente->telefone : '' }}" placeholder="" required autofocus maxlength="13">

                                @if ($errors->has('telefone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{  isset($cliente) ? $cliente->email : '' }}" placeholder="" required autofocus maxlength="">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" >
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                    @if(\Session::has('message'))
                        <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
