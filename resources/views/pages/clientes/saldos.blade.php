@extends('layouts.app')

@section('title', 'Reporte de saldos')

@section('content')
<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h4 class="mb-1">Crédito a Clientes - REPORTE DE SALDOS</h4>
            <div class="card-tools">
                <a class="btn btn-light" href="{{ route('clientes.saldos.pdf') }}">
                    <i class="fa fa-print"></i> Imprimir reporte
                </a>
            </div>
        </div>
        <div class="card-body table-responsive-xl">
            <h3 class="card-title text-info">Total de créditos pendientes: <span class="h1 font-weight-bold text-primary">S/ {{ number_format($clientes->sum('deuda_actual'), 2) }}</span></h3>
            <hr>
            <table class="table table-sm table-bordered table-hover" id="tablaSaldos">
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
    </div>
</div>
@endsection