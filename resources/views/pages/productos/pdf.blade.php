@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('header', '')

@section('content')
    <h1 class="page-header">Listado de Productos</h1>
    <table class="table table-sm table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Código</th>
            <th>Descripción del Producto</th>
            <th>Departamento</th>
            <th>Costo</th>
            <th>P. Venta</th>
            <th>P. Mayoreo</th>
            <th>Existencia</th>
            <th>Stock Mínimo</th>
            <th>Stock Máximo</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr>
                <th scope="row">{{ $producto->id }}</th>
                <td>{{ $producto->codigo }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->departamento->nombre }}</td>
                <td>{{ $producto->pcosto }}</td>
                <td>{{ $producto->pventa }}</td>
                <td>{{ $producto->pmayoreo }}</td>
                <td>{{ $producto->dinventario }}</td>
                <td>{{ $producto->dinvminimo }}</td>
                <td>{{ $producto->dinvmaximo }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection