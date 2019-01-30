@extends('layouts.app')

@section('title', 'Productos Bajos en Inventario')

@section('content')
    <low-inventory-products-component>
    </low-inventory-products-component>
@endsection

@section('scripts')
    @parent
@endsection
