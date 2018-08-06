@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h4 class="mb-0">MODIFICAR CLIENTE</h4>
            </div>
            {!! Form::model($cliente, ['route' => ['clientes.update', $cliente], 'method' => 'PUT']) !!}
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Modifique la información deseada, y guarde los cambios:</h5>
                <hr>
                @include('pages.clientes.partials.form')
            </div>
            <div class="card-footer">
                <div class="d-flex flex-row-reverse">
                    {{ Form::button('<i class="fa fa-save"></i> Guardar Cambios', ['class' => 'btn btn-primary ml-3', 'type' => 'submit']) }}
                    {{ Form::button('<i class="fa fa-undo"></i> Restablecer', ['class' => 'btn btn-outline-warning', 'type' => 'reset']) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection