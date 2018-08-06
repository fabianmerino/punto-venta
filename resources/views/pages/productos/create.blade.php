@extends('layouts.app')

@section('title', 'Nuevo Cliente')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white bg-primary ">
                <h4 class="mb-0">NUEVO PRODUCTO</h4>
            </div>
            {!! Form::open(['route' => 'clientes.store', 'method' => 'POST', 'role' => 'form', 'novalidate']) !!}
            <div class="card-body">
                <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                    <li class="nav-item">
                        <a href="#nuevo" class="nav-link active" id="nuevo-tab" data-toggle="tab" role="tab" aria-controls="nuevo" aria-selected="true">Nuevo</a>
                    </li>
                    <li class="nav-item">
                        <a href="#componentes" class="nav-link disabled" id="componentes-tab" data-toggle="tab" role="tab" aria-controls="componentes" aria-selected="false">Componentes</a>
                    </li>
                    <li class="nav-item">
                        <a href="#impuestos" class="nav-link" id="impuestos-tab" data-toggle="tab" role="tab" aria-controls="impuestos" aria-selected="false">Impuestos</a>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="nav-tabContent">
                    <div id="nuevo" class="tab-pane fade show active" role="tabpanel" aria-labelledby="nuevo-tab">
                        <h5 class="font-weight-bold">Llene los siguientes datos acerca del Nuevo Producto:</h5>
                        <hr>
                        @include('pages.productos.partials.form')
                    </div>
                    <div id="componentes" class="tab-pane fade" role="tabpanel" aria-labelledby="componentes-tab">
                       <p>Componentes</p>
                    </div>
                    <div id="impuestos" class="tab-pane fade" role="tabpanel" aria-labelledby="impuestos-tab">
                        Impuestos
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex flex-row-reverse">
                    {{ Form::button('<i class="fa fa-save"></i> Guardar Producto', ['class' => 'btn btn-primary ml-2', 'type' => 'submit']) }}
                    {{ Form::button('<i class="fa fa-broom"></i> Limpiar', ['class' => 'btn btn-outline-warning', 'type' => 'reset']) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection