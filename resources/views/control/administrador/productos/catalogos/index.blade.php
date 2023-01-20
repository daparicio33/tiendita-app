@extends('adminlte::page')
@section('title','Catalogo')
@section('content_header')
  <h1>Lista de productos</h1>
@stop 
@section('content')
<div class='card'>
  <div class='card-header'>
    <h5>Todos los productos</h5>
    <a href="{{route('control.administrador.productos.catalogos.create')}}">
      <button class='btn btn-primary'>
        <i class='fas fa-folder-open'></i> Registrar nuevo cliente
      </button>
    </a>
  </div>
  <div class='card-body'>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Precio</th>
        </tr>
      </thead>
    <tbody>
@foreach ($catalogos as $catalogo)
  <tr>
    <td>{{ $catalogo->id }}</td>
   <td>{{$catalogo->nombre}}</td>
   <td>{{$catalogo->precio}}</td>
   <td style="text-align: center; width: 160px">
    <td>
      <a href="{{ route('control.administrador.productos.catalogos.edit', $catalogo->id) }}">
        <button class="btn btn-primary">
            <i class="far fa-edit"></i> Editar
        </button>
      </a>
    </td>
    <td>
      <a data-toggle="modal" data-target="#modal-delete-{{ $catalogo->id }}">
         <button class="btn btn-danger">
           <i class="fas fa-trash-alt"></i> Eliminar
         </button>
      </a>
    </td>
  </tr>
  @include('control.administrador.productos.catalogos.modal')
  @endforeach

    <tbody>
    </tbody>
  </table>
  </div>
</div>
@endsection