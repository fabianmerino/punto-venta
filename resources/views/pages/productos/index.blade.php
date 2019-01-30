@extends('layouts.app')

@section('title', 'Productos')

@section('content')
  <div class="container-fluid mt-5">
    <div class="card">
      <div class="card-header c-card-header text-white bg-primary">
        <h4 class="mb-1">Catálogo de Productos</h4>
        <div class="card-tools">
          <a class="btn btn-secondary" href="{{ route('productos.create') }}">
            <i class="fa fa-plus-circle"></i> Agregar Producto
          </a>
        </div>
      </div>
      <div class="card-body table-responsive-xl">
        <table class="table table-sm table-bordered table-hover" id="tablaProductos">
          <thead>
          <tr>
            <th>#</th>
            <th>Código</th>
            <th>Descripción del Producto</th>
            <th>Departamento</th>
            <th>Costo</th>
            <th>P. Venta</th>
            <th>P. Mayoreo</th>
            <th>Existencia</th>
            <th>Stock Mínimo</th>
            <th>Stock Máximo</th>
            <th>IGV</th>
          </tr>
          </thead>
          <tbody>
          @foreach($productos as $producto)
            <tr>
              <th scope="row">{{ $producto->id }}</th>
              <td>{{ $producto->codigo }}</td>
              <td>{{ $producto->descripcion }}</td>
              <td>{{ $producto->departamento->nombre }}</td>
              <td>{{ $producto->pcosto }}</td>
              <td>{{ $producto->pventa }}</td>
              <td>{{ $producto->pmayoreo }}</td>
              <td>{{ $producto->dinventario }}</td>
              <td>{{ $producto->dinvminimo }}</td>
              <td>{{ $producto->dinvmaximo }}</td>
              <td class="d-flex justify-content-around">
                <a class="btn btn-sm btn-outline-info" href="{{ route('productos.show', ['producto' => $producto]) }}">
                  <i class="fas fa-eye fa-md"></i>
                </a>
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('productos.edit', ['producto' => $producto]) }}">
                  <i class="fas fa-edit fa-md"></i>
                </a>
                {{ Form::open( array( 'route' => array('clientes.destroy', $producto),'method' => 'DELETE', 'style' => 'display: inline-block; margin-bottom: 0;', 'hidden' )) }}
                {{ Form::close() }}
                {{ Form::button('<i class="fas fa-trash"></i>', ['class' => 'btn  btn-sm btn-outline-danger', 'onClick' => 'confDelete(this)']) }}
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection