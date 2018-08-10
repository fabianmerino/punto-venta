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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function (){
    //Rutas para la opción Clientes
    Route::resource('clientes', 'ClienteController');
    Route::get('/reportes/saldos', 'ClienteController@saldos')->name('reporte-saldos');
    //Rutas para la opción Productos
    Route::resource('productos', 'ProductoController');
    Route::resource('departamentos', 'DepartamentoController')->except(['create', 'edit']);
    Route::get('/departments', function () {
        return view('pages.departamentos.index');
    })->name('dep');
});


