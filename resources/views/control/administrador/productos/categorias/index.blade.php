@extends('adminlte::page')
@section('title','Categoria')
@section('content_header')
  <h1>Lista de categorias</h1>
@stop 
@section('content')
<div class='card'>
  <div class='card-header'>
    <h5>Todas las categorias</h5>
    <a href="{{route('control.administrador.productos.categorias.create')}}">
      <button class='btn btn-primary'>
        <i class='fas fa-folder-open'></i> Registrar nueva categoria
      </button>
    </a>
  </div>
 @include('layouts.info')
  <div class='card-body'>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
        </tr>
      </thead>
    <tbody>
@foreach ($categorias as $categoria)
  <tr>
    <td>{{ $categoria->id }}</td>
   <td>{{$categoria->nombre}}</td>
   <td style="text-align: center; width: 160px">
    <td>
      <a href="{{ route('control.administrador.productos.categorias.edit', $categoria->id) }}">
        <button class="btn btn-primary">
            <i class="far fa-edit"></i> Editar
        </button>
      </a>
    </td>
    <td>
      <a data-toggle="modal" data-target="#modal-delete-{{ $categoria->id }}">
         <button class="btn btn-danger">
           <i class="fas fa-trash-alt"></i> Eliminar
         </button>
      </a>
    </td>
  </tr>
  @include('control.administrador.productos.categorias.modal')
  @endforeach

    <tbody>
    </tbody>
  </table>
  </div>
</div>
@endsection