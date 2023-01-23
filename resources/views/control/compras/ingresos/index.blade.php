@extends('adminlte::page')
@section('title','Compras')
@section('content_header')
  <h1>Lista de compras</h1>
@stop 
@section('content')
<div class='card'>
  <div class='card-header'>
    <h5>Todos los proveedores</h5>
    <a href="{{route('control.compras.proveedores.create')}}">
      <button class='btn btn-primary'>
        <i class='fas fa-folder-open'></i> Registrar nueva compra
      </button>
    </a>
  </div>
@include('layouts.info')
  <div class='card-body'>
    <table class="table">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Usuario</th>
          <th>Proveedor</th>
          <th>Codigo de comprobrante</th>
          <th>Tipo de comprobante</th>
        </tr>
      </thead>
    <tbody>
@foreach ($ingresos as $ingreso)
  <tr>
    <td>{{$ingreso->fecha}}</td>
   <td>{{$ingreso->user->name}}</td>
   <td>{{$ingreso->proveedor->nombre}}</td>
   <td>{{$ingreso->codComprobante}}</td>
   <td>{{$ingreso->tipoComprobante}}</td>
   <td style="text-align: center; width: 160px">
    <td>
      <a href="{{ route('control.compras.proveedores.edit', $ingreso->id) }}">
        <button class="btn btn-primary">
            <i class="far fa-edit"></i> Editar
        </button>
      </a>
    </td>
    <td>
      <a data-toggle="modal" data-target="#modal-delete-{{ $ingreso->id }}">
         <button class="btn btn-danger">
           <i class="fas fa-trash-alt"></i> Eliminar
         </button>
      </a>
    </td>
  </tr>
  @include('control.compras.proveedores.modal')
  @endforeach

    <tbody>
    </tbody>
  </table>
  </div>
</div>
@endsection