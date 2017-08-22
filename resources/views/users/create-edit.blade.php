@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{Request::is('cadastro') ? 'Cadastrar Usuario' : 'Editar Usuario'}}</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="@if(Request::is('cadastro')) /salvar @else /editar/{{$usuario->id}} @endif">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ isset($usuario) ? $usuario->name : ''}}" placeholder="" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ isset($usuario) ? $usuario->email : ''}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label" >Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Perfil</label>

                            <div class="col-md-6">
                                <select name="perfil" class="form-control" required>
                                    <option value="0">Selecione um perfil</option>
                                    <option value="1" @if(isset($usuario) && $usuario->perfil == 1 ) selected="selected" @endif>Administração</option>
                                    <option value="2" @if(isset($usuario) && $usuario->perfil == 2 ) selected="selected" @endif>Vendas</option>
                                    <option value="3" @if(isset($usuario) && $usuario->perfil == 3 ) selected="selected" @endif>Financeiro</option>
                                </select>
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
