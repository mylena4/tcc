@extends('layouts.app')

@section('content')

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script>
    $(function () {
        var i = 0;
        //var scntDiv = $('#dynamicDiv');
        $(document).on('click', '#addInput', function () {
            var div = document.querySelector("#dynamicDiv");
            //console.log("tamo aqui");
            //valor = `<input type="text" name="test" value="tentandoaqui"/>`;
            
            //++i;
            valor = '<p>'+
                          '<label class="col-md-4 control-label"></label>'+
                            '<select name="produto[]" class="form-control" >'+
                               '<option>Selecione um Produto</option>'+
                                '@foreach($produtos as $produto)'+
                                    '<option value="{{ $produto->id }}">'+
                                        '{{ $produto->nome }}'+
                                    '</option>'+
                                '@endforeach'+
                            '</select>'+
                            '<input type="number" class="form-control" step=0.1  name="qtd[]" placeholder="Quantidade" size="20" /> '+
                            '<a class="btn btn-danger" href="javascript:void(0)" id="remInput">'+	
                                'Remover'+
                            '</a>'+
                            '</p>';
            div.innerHTML = div.innerHTML + valor;        
            //scntDiv = scntDiv.innerHTML + novaDiv;
            return false;
			    });
			    $(document).on('click', '#remInput', function () {
		            $(this).parents('p').remove();
			        return false;
			    });
			});
</script>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">{{ Request::is('cadastro/pedi') ? 'Cadastrar ' : 'Editar ' }} Pedido</div>
            <div class="panel-body">

                <form class="form-horizontal" role="form" method="POST" action="@if(Request::is('cadastro/pedi')) /salvar/pedi @else /editar/pedi/{{$pedido->id}} @endif">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Cliente: </label>
                            <div class="col-md-6">
                                <select name="cliente" class="form-control">
                                    <option value="Selecione">Selecione um cliente</option>
                                    @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">
                                        {{ $cliente->nome }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                  

                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">Produtos: </label>
			
			
			<div class="form-inline">			
			        <select name="produto[]" class="col-md-6 form-control" >
                                    <option>Selecione um Produto</option>
                                    @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}">
                                        {{ $produto->nome }}
                                    </option>
                                    @endforeach
                                </select>
                                    <input type="number" class="form-control " step=1 id="inputeste" name="qtd[]" placeholder="Quantidade" /> 
                            
                            <a class="btn btn-primary" href="javascript:void(0)" id="addInput">
				Adicionar 
			</a>
                                    <div  id="dynamicDiv">
                                        
                                    </div>
                        </div>                        
                    </div>


                <div class="form-group{{ $errors->has('preco') ? ' has-error' : '' }}">
                    <label for="preco" class="col-md-4 control-label">Valor Total: </label>

                    <div class="col-md-6">
                        <input id="descricao" type="number" step="0.1" class="form-control" name="preco" placeholder="" > 

                        @if ($errors->has('preco'))
                        <span class="help-block">
                            <strong>{{ $errors->first('preco') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                    
                <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                    <label for="descricao" class="col-md-4 control-label">Observação</label>

                    <div class="col-md-6">
                        <textarea id="descricao"  class="form-control" name="descricao" value="{{ isset($produto) ? $produto->descricao : ''}}" placeholder="" ></textarea>

                        @if ($errors->has('descricao'))
                        <span class="help-block">
                            <strong>{{ $errors->first('descricao') }}</strong>
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
