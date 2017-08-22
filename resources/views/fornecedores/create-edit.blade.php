@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Request::is('cadastro/forn') ? 'Cadastrar Fornecedor' : 'Editar Fornecedor' }}</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="@if(Request::is('cadastro/forn')) /salvar/forn @else /editar/forn/{{$fornecedor->id}} @endif">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ isset($fornecedor) ? $fornecedor->nome : '' }}" placeholder="" required autofocus>

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
                                <input id="endereco" type="text" class="form-control" name="endereco" value="{{ isset($fornecedor) ? $fornecedor->endereco : ''}}" placeholder="" required autofocus>

                                @if ($errors->has('endereco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}">
                            <label for="cnpj" class="col-md-4 control-label">CNPJ</label>

                            <div class="col-md-6">
                                <input id="cnpj" type="text" class="form-control" name="cnpj" value="{{  isset($fornecedor) ? $fornecedor->cnpj : '' }}" placeholder="" required autofocus maxlength="13">

                                @if ($errors->has('cnpj'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cnpj') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                            <label for="cnpj" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control" name="telefone" value="{{  isset($fornecedor) ? $fornecedor->telefone : '' }}" placeholder="" required autofocus maxlength="13">

                                @if ($errors->has('telefone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
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
