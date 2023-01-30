@extends('adminlte::page')
@section('title','Ventas')
@section('content_header')
  <h1>Lista de ventas</h1>
@stop 
@section('content')
<div class='card'>
  <div class='card-header'>
    <h5>Todas las ventas</h5>
    <a href="{{route('control.vendedor.ventas.create')}}">
      <button class='btn btn-primary'>
        <i class='fas fa-folder-open'></i> Registrar nueva venta
      </button>
    </a>
  </div>
  <div class='card-body'>
    <table class="table">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Cliente</th>
          <th>Tipo de pago</th>
          <th>Total</th>
          <th>Codigo de comprobante</th>
          <th>Tipo de comprobante </th>
        </tr>
      </thead>
    <tbody>
@foreach ($ventas as $venta)
  <tr>
    <td>{{$venta->fecha}}</td>
    <td>{{ $venta->cliente_id->nombre }}</td>
    <td>{{ $venta->mpago->nombre}}</td>
    <td>{{ $venta->total }}</td>
    <td>{{ $venta->codComprobante }}</td>
    <td>{{ $venta->tipoComprobante }}</td>
   <td style="text-align: center; width: 160px">
    <td>
      <a href="{{ route('control.vendedor.ventas.edit', $venta->id) }}">
        <button class="btn btn-primary">
            <i class="far fa-edit"></i> Editar
        </button>
      </a>
    </td>
    <td>
      <a data-toggle="modal" data-target="#modal-delete-{{ $venta->id }}">
         <button class="btn btn-danger">
           <i class="fas fa-trash-alt"></i> Eliminar
         </button>
      </a>
    </td>
    <td>
      <a data-toggle="modal" data-target="#modal-mostrar-{{ $venta->id }}">
         <button class="btn btn-success">
           <i class="fas fa-trash-alt"></i> Eliminar
         </button>
      </a>
    </td>
  </tr>
  @include('control.vendedor.ventas.modal')
  @endforeach

    <tbody>
    </tbody>
  </table>
  </div>
</div>
@endsection