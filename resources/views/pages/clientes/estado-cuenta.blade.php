@extends('layouts.app')

@section('title', 'Estado de Cuenta')

@section('content')
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h4 class="mb-1">ESTADO DE CUENTA</h4>
                <div class="card-tools">
                    <a class="btn btn-outline-light" href="{{ route('clientes.edit', $cliente) }}">
                        <i class="fa fa-user-edit"></i> Modificar datos del cliente
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive-xl">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h3 class="card-title text-info font-weight-bold">{{ $cliente->nombre }}</h3>
                        <h5 class="card-subtitle text-danger">Deuda: S/ {{ $cliente->deuda_actual }}</h5>
                    </div>
                    <div class="col-sm-6 text-right">
                        <h3 class="text-success">Límite de crédito: S/ {{$cliente->limite_credito}}</h3>
                    </div>
                </div>
                <hr>
               <div class="btn-toolbar bg-primary p-2" role="toolbar">
                   <div class="btn-group" role="group">
                       <button type="button" class="btn btn-light  btn-sm border border-primary"><i class="fa fa-print text-primary"></i>  Impirmir Estado Cta.</button>
                       <button type="button" class="btn btn-light  btn-sm border border-primary"><i class="fa fa-print text-primary"></i>  Imprimir Est. Cta. Completo</button>
                       <button type="button" class="btn btn-light  btn-sm border border-primary"><i class="fa fa-coins text-warning"></i>  Abonar</button>
                       <button type="button" class="btn btn-light  btn-sm border border-primary"><i class="fa fa-check-double text-success"></i>  Liquidar Adeudo</button>
                       <button type="button" class="btn btn-light  btn-sm border border-primary"><i class="fa fa-list-ol text-info"></i>  Detalle de abonos</button>
                   </div>
               </div>
                <div class="row">
                    <div class="col-2 pr-0">
                        <table class="table table-sm table-hover" id="tablaMesEstCta">
                            <thead class="text-white-50 bg-primary">
                                <tr>
                                    <th scope="col">Mes de calendario</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    
                    </div>
                    <div class="col-10 pl-0">
                        <table class="table table-sm table-bordered table-hover" id="tablaEstadoCuenta">
                            <thead class="text-white-50 bg-primary">
                                <tr class="text-center">
                                    <th scope="col">Descripción del producto</th>
                                    <th scope="col">Precio de venta</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Importe</th>
                                </tr>
                            </thead>
                            <tbody>
        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection