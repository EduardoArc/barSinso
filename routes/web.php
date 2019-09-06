<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tragospedido', function () {
   
});

Route::get('/pedidostrago', function () {
    $pedido= App\Pedido::findOrFail(1);
    
    $pedido->tragos()->attach(1);
});

