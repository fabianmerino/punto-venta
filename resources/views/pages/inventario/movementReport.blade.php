@extends('layouts.app')

@section('title', 'Reporte de Movimientos')

@section('content')
    <movement-report-component
        :cajas="{{ json_encode($cajas) }}">
    </movement-report-component>
@endsection

@section('scripts')
    @parent
@endsection
