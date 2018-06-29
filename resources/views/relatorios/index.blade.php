@extends('layouts.app')

@section('content')
<style>
a.white:link {
    color:  #ffffff;
}

/* visited link */
.white:visited {
    color: #ffffff;
}

/* mouse over link */
a.white:hover {
    color: #ffffff;
}

/* selected link */
a.white:active {
    color: #ffffff;
}
 
</style>

    <div class="panel-heading col-md-offset-2"><h2>Relatórios</div>
<div class="row col-md-offset-2">
			
			
			<div class="col-md-11">
				<div class="panel panel-orange">
                                    <a href="/relatorios/mesatual" class="white"><div class="panel-heading dark-overlay">Pedidos do Mês Atual</div></a>
					
				</div>
			</div>
			
			<div class="col-md-11">
				<div class="panel panel-blue">
					 <a href="/relatorios/ano" class="white"><div class="panel-heading dark-overlay">Pedidos do Ano</div></a>
				</div>
			</div><!--/.col-->
			
		</div><!--/.row-->	
