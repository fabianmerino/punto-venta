@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header c-card-header text-white bg-primary">
            <h4 class="mb-1">Lista de Clientes</h4>
            <div class="card-tools">
                <a class="btn btn-secondary" href="{{ route('clientes.create') }}">
                    <i class="fa fa-plus-circle"></i> Agregar Cliente
                </a>
                <a class="btn btn-outline-light" href="{{ route('reporte-saldos') }}">
                    <i class="far fa-id-badge"></i> Reporte de Saldos
                </a>
            </div>
        </div>
        <div class="card-body table-responsive-xl">
            <table class="table table-sm table-bordered table-hover" id="tablaClientes">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>RUC</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Sitio Web</th>
                        <th>Límite crédito</th>
                        <th>Deuda Actual</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <th scope="row">{{ $cliente->folio }}</th>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->dni }}</td>
                            <td>{{ $cliente->ruc }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->web }}</td>
                            <td>{{ $cliente->limite_credito }}</td>
                            <td>{{ $cliente->deuda_actual }}</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-sm btn-outline-info" href="{{ route('clientes.show', ['cliente' => $cliente]) }}">
                                    <i class="fas fa-eye fa-md"></i>
                                </a>
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('clientes.edit', ['cliente' => $cliente]) }}">
                                    <i class="fas fa-edit fa-md"></i>
                                </a>
                                {{ Form::open( array( 'route' => array('clientes.destroy', $cliente),'method' => 'DELETE', 'style' => 'display: inline-block; margin-bottom: 0;', 'hidden' )) }}
                                {{ Form::close() }}
                                {{ Form::button('<i class="fas fa-trash"></i>', ['class' => 'btn  btn-sm btn-outline-danger', 'onClick' => 'confDelete(this)']) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection