@extends('layouts.app')

@section('content')
    <div class="panel-heading"><h2>{{Request::is('cadastro/mate') ? 'Cadastrar Material' : 'Editar Material'}}</h2></div>
    <div class="panel-body">

        <form method="post" class="form-horizontal"
              action="@if(Request::is('cadastro/mate')) /salvar/mate @else /editar/mate/{{$material->id}} @endif">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-3 control-label">Nome: </label>
                <div class="col-md-8">
                    <input name="nome" class="form-control" value="{{ isset($material) ? $material->nome : '' }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Descrição: </label>
                <div class="col-md-8">
                    <input name="descricao" class="form-control" value="{{ isset($material) ? $material->descricao : ''}}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Preço Unitário: </label>
                <div class="col-md-6">
                    <input name="preco" class="form-control"
                           type="number" step="0.1" value="{{ isset($material) ? round($material->preco,1) : ''}}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Quantidade: </label>
                <div class="col-md-3">
                    <input name="quantidade" class="form-control" value="{{isset($material) ? $material->quantidade : ''}}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Fornecedor: </label>
                <div class="col-md-8">
                    <select name="fornecedor" class="form-control">
                        <option>Selecione um fornecedor</option>
                        @foreach($fornecedores as $fornecedor)
                            <option value="{{ $fornecedor->id }}"
                                    @if(isset($material))
                                    @if($fornecedor->id == $material->fornecedor->id)
                                    selected="selected"
                                    @endif
                                    @endif>
                                {{ $fornecedor->nome}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-6">
                    <input type="submit" class="btn btn-primary" value="Salvar" >
                </div>
            </div>
            @if(\Session::has('message'))
                <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
            @endif
        </form>
    </div>
@endsection