<?php

Route::get('/excel', function() {
   Excel::create('Laravel Excel', function($excel) {

    $excel->sheet('Excel sheet', function($sheet) {

        $sheet->setOrientation('landscape');
        $sheet->row(1, array(
             'test1', 'test2'
        ));

        // Manipulate 2nd row
        $sheet->row(2, array(
            'test3', 'test4'
        ));

    });

   })->export('xls'); 
});

//Rotas Auth
Route::get('/', function(){
    return view('auth.login');
})->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/password', function(){
    return view('auth.passwords.reset');
})->name('password');

//Rota home
Route::get('/home', 'HomeController@index')->name('home');

//Rotas Usuarios
Route::get('/usuarios', 'UserController@index');
Route::get('/cadastro', function(){
    return view('users.create-edit');
})->name('cadastro');
Route::post('/salvar', 'UserController@store')->name('usuarios-salvar');
Route::get('/editar/{id}', 'UserController@editview') ;
Route::post('/editar/{id}', 'UserController@edit');
Route::get('/status/{id}', 'UserController@editstatus');
Route::get('/consulta/', 'UserController@search');

//Rotas Fornecedores
Route::get('/fornecedores','FornecedoresController@index') ;
Route::get('/cadastro/forn',function(){
    return view('fornecedores.create-edit');
})->name('cadastroforn');
Route::post('/salvar/forn', 'FornecedoresController@store')->name("fornecedor-salvar");
Route::get('/editar/forn/{id}', 'FornecedoresController@editview') ;
Route::post('/editar/forn/{id}', 'FornecedoresController@edit');
Route::get('/deletar/forn/{id}', 'FornecedoresController@delete');
Route::post('/forn/{find}', 'FornecedoresController@search');
Route::get('/forn/{find}', 'FornecedoresController@search');
Route::get('/consulta/forn', 'FornecedoresController@search');

//Rotas Estoque
Route::get('/materiais', 'EstoqueController@index');
Route::get('/cadastro/mate','EstoqueController@createview')->name('cadastromate');
Route::post('/salvar/mate', 'EstoqueController@store')->name("material-salvar");
Route::get('/editar/mate/{id}', 'EstoqueController@editview') ;
Route::post('/editar/mate/{id}', 'EstoqueController@edit');
Route::get('/deletar/mate/{id}', 'EstoqueController@delete');
Route::get('/consulta/mate', 'EstoqueController@search');

//Rotas Clientes
Route::get('/clientes', 'ClienteController@index');
Route::get('/cadastro/clie', function(){
    return view('clientes.create-edit');
})->name('cadastroclie');
Route::post('/salvar/clie', 'ClienteController@store')->name('clientes-salvar');
Route::get('/editar/clie/{id}', 'ClienteController@editview') ;
Route::post('/editar/clie/{id}', 'ClienteController@edit');
Route::get('/deletar/clie/{id}', 'ClienteController@delete');
Route::post('/clientes/{find}', 'ClienteController@search');
Route::get('/clientes/{find}', 'ClienteController@search');
Route::get('/consulta/clie', 'ClienteController@search');

//Rotas Produtos
Route::get('/produtos', 'ProdutoController@index');
Route::get('/cadastro/prod','ProdutoController@createview')->name('cadastroprod');
Route::post('/salvar/prod', 'ProdutoController@store')->name('produtos-salvar');
Route::get('/editar/prod/{id}', 'ProdutoController@editview') ;
Route::post('/editar/prod/{id}', 'ProdutoController@edit');
Route::get('/deletar/prod/{id}', 'ProdutoController@delete');
Route::get('/consulta/prod', 'ProdutoController@search');
Route::get('/detalhes/prod/{id}', 'ProdutoController@details');


//Rotas Pedidos
Route::get('/pedidos', 'PedidoController@index');
Route::get('/cadastro/pedi','PedidoController@createview')->name('cadastropedi');
Route::post('/salvar/pedi', 'PedidoController@store')->name('pedidos-salvar');
Route::get('/editar/pedi/{id}', 'PedidoController@editview') ;
Route::post('/editar/pedi/{id}', 'PedidoController@edit');
Route::get('/deletar/pedi/{id}', 'PedidoController@delete');
Route::get('/consulta/pedi', 'PedidoController@search');

