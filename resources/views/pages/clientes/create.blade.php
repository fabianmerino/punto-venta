@extends('layouts.app')

@section('title', 'Nuevo Cliente')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h4 class="mb-0">NUEVO CLIENTE</h4>
        </div>
        {!! Form::open(['route' => 'clientes.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
        <div class="card-body">
            <h5 class="card-title font-weight-bold">Llene los siguientes datos acerca del Nuevo Cliente:</h5>
            <hr>
            @include('pages.clientes.partials.form')
        </div>
        <div class="card-footer">
            <div class="d-flex flex-row-reverse">
                {{ Form::button('<i class="fa fa-save"></i> Guardar Cliente', ['class' => 'btn btn-primary ml-2', 'type' => 'submit', 'novalidate']) }}
                {{ Form::button('<i class="fa fa-broom"></i> Limpiar', ['class' => 'btn btn-outline-warning', 'type' => 'reset']) }}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection