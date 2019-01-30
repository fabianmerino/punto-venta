@extends('layouts.app')

@section('title', 'Nuevo Producto')

@section('content')
    <nuevo-producto-component :productos=" {{ json_encode($productos) }}"
                              :medidas="{{ json_encode($medidas) }}"
                              :departamentos="{{ json_encode($departamentos) }}"
                              :impuestos="{{ json_encode($impuestos) }}">
    </nuevo-producto-component>
@endsection

@section('scripts')
    @parent
@endsection