@extends('layouts.app')

@section('title', 'Departamentos')

@section('content')
    
    <div class="container-fluid mt-5">
        <h4 class="text-capitalize">Departamentos</h4>
        <hr>
        <departamento-component></departamento-component>
    </div>
@endsection