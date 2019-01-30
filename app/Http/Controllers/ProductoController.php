<?php

namespace App\Http\Controllers;

use App\Caja;
use App\Departamento;
use App\Impuesto;
use App\Medida;
use App\Producto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('pages.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::all();
        $medidas = Medida::where('activo', 1)->get(['id', 'unid_enteros', 'unid_fracciones']);
        $productos = Producto::all();
        $impuestos = Impuesto::all();
        return view('pages.productos.create', compact('departamentos', 'medidas', 'productos', 'impuestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
    
    public function ventasPeriodo()
    {
        $cajas = Caja::all();
        return view('pages.productos.ventasxperiodo', compact('cajas'));
    }
    
    public function promos()
    {
        return view('pages.productos.promociones');
    }
    
    public function pdf()
    {
        $products = Producto::all();
        $pdf = PDF::loadView('productos.pdf', compact('products'));
        return $pdf->download('listadoproductos.pdf');
    }
}
