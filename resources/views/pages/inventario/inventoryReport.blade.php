@extends('layouts.app')

@section('title', 'Reporte de Inventario')

@section('content')
    <inventory-report-component
        :departamentos="{{ json_encode($departamentos) }}">
    </inventory-report-component>
@endsection

@section('scripts')
    @parent
@endsection
