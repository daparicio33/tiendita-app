@extends('adminlte::page')
@section('title','Proveedores')
@section('content_header')
  <h1>Lista de proveedores</h1>
@stop 
@section('content')
<div class='card'>
  <div class='card-header'>
    <h5>Todos los proveedores</h5>
    <a href="{{route('control.administrador.compras.proveedores.create')}}">
      <button class='btn btn-primary'>
        <i class='fas fa-folder-open'></i> Registrar nuevo proveedor
      </button>
    </a>
  </div>
  <div class='card-body'>
    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>RUC</th>
          <th>Contacto</th>
          <th>Direccion</th>
          <th>Telefono</th>
        </tr>
      </thead>
    <tbody>
@foreach ($proveedores as $proveedore)
  <tr>
    <td>{{$proveedore->nombre}}</td>
   <td>{{$proveedore->Ruc}}</td>
   <td>{{$proveedore->contacto}}</td>
   <td>{{$proveedore->direccion}}</td>
   <td>{{$proveedore->telefono }}</td>
   <td style="text-align: center; width: 160px">
    <td>
      <a href="{{ route('control.administrador.compras.proveedores.edit', $proveedore->id) }}">
        <button class="btn btn-primary">
            <i class="far fa-edit"></i> Editar
        </button>
      </a>
    </td>
    <td>
      <a data-toggle="modal" data-target="#modal-delete-{{ $proveedore->id }}">
         <button class="btn btn-danger">
           <i class="fas fa-trash-alt"></i> Eliminar
         </button>
      </a>
    </td>
  </tr>
  @include('control.administrador.compras.proveedores.modal')
  @endforeach

    <tbody>
    </tbody>
  </table>
  </div>
</div>
@endsection