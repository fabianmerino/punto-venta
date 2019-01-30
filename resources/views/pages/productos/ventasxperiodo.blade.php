@extends('layouts.app')

@section('title', 'Ventas por Periodo')

@section('content')
    <ventas-por-periodo-component
            :cajas="{{ json_encode($cajas) }}">
    </ventas-por-periodo-component>
@endsection

@section('scripts')
    @parent
@endsection