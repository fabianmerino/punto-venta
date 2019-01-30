@extends('layouts.app')

@section('title', 'Listado de Saldos')

@section('header', '')

@section('content')
    <div class="table-responsive-xl">
        <h3 class="text-info">Total de créditos pendientes: <span class="h2 font-weight-bold text-primary">S/ {{ number_format($clientes->sum('deuda_actual'), 2) }}</span></h3>
        <hr>
        <table class="table table-sm table-bordered table-hover">
            <thead>
            <tr class="text-center">
                <th>#</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Límite crédito</th>
                <th>Deuda Actual</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->folio }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td class="text-center">{{ $cliente->dni }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td class="font-weight-bold text-center">{{ $cliente->telefono }}</td>
                    <td class="font-weight-bold text-monospace text-right">{{ $cliente->limite_credito }}</td>
                    <td class="font-weight-bold text-right"><strong class="text-monospace {{ $cliente->deuda_actual > 0 ? 'text-danger' : 'text-success' }}">{{ $cliente->deuda_actual }}</strong></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection