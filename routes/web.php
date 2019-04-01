<?php


use Illuminate\Support\Facades\Route;
use App\Departamento;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function (){
    //Rutas para la opción Clientes
    Route::resource('clientes', 'ClienteController');
    Route::get('/reportes/saldos', 'ClienteController@saldos')->name('reporte-saldos');
    Route::get('/reportes/descargar-saldos', 'ClienteController@pdfsaldos')->name('clientes.saldos.pdf');
    //Rutas para la opción Productos
    Route::resource('productos/departamentos', 'DepartamentoController')->except(['create', 'edit']);
    Route::resource('productos', 'ProductoController');
    Route::get('descargar-productos', 'ProductoController@pdf')->name('productos.pdf');
    Route::resource('departamentos', 'DepartamentoController')->except(['create', 'edit']);
    Route::get('/departments', function () {
        return view('pages.departamentos.index');
    })->name('dep');
    Route::get('/ventas-periodo', 'ProductoController@ventasPeriodo')->name('ventas-periodo');
    Route::get('/promos', 'ProductoController@promos')->name('promos');
    //Rutas para la opción Inventario
    Route::get('inventario/add', function () {
        return view('pages.inventario.add');
    })->name('inventario.add');
    Route::get('inventario/adjustment', function () {
        return view('pages.inventario.adjustment');
    })->name('inventario.adjustment');
    Route::get('inventario/lowInventoryProducts', function () {
        return view('pages.inventario.lowInventory');
    })->name('inventario.low');
    Route::get('inventario/inventoryReport', function () {
        $departamentos = Departamento::all();
        return view('pages.inventario.inventoryReport', compact('departamentos'));
    })->name('inventario.inventoryReport');
    Route::get('inventario/movementReport', function () {
        $cajas = \App\Caja::all();
        return view('pages.inventario.movementReport', compact('cajas'));
    })->name('inventario.movementReport');
    Route::get('inventario/kardex', function () {
        return view('pages.inventario.kardex');
    })->name('inventario.kardex');
});


