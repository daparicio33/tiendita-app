@extends('adminlte::page')
@section('title','Clientes')
@section('content_header')
  <h1>Lista de clientes</h1>
@stop 
@section('content')
<div class='card'>
  <div class='card-header'>
    <h5>Todos los clientes</h5>
    <a href="{{route('control.vendedor.clientes.create')}}">
      <button class='btn btn-primary'>
        <i class='fas fa-folder-open'></i> Registrar nuevo cliente
      </button>
    </a>
  </div>
  @include('layouts.info')
  <div class='card-body'>
    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>DNI/RUC</th>
          <th>Direccion</th>
          <th>Telefono</th>
        </tr>
      </thead>
    <tbody>
@foreach ($clientes as $cliente)
  <tr>
    <td>{{$cliente->nombre}}</td>
    <td>{{ $cliente->dniRuc }}</td>
    <td>{{ $cliente->direccion}}</td>
    <td>{{ $cliente->telefono}}</td>
   <td style="text-align: center; width: 160px">
    <td>
      <a href="{{ route('control.vendedor.clientes.edit', $cliente->id) }}">
        <button class="btn btn-primary">
            <i class="far fa-edit"></i> Editar
        </button>
      </a>
    </td>
    <td>
      <a data-toggle="modal" data-target="#modal-delete-{{ $cliente->id }}">
         <button class="btn btn-danger">
           <i class="fas fa-trash-alt"></i> Eliminar
         </button>
      </a>
    </td>
  </tr>
  @include('control.vendedor.clientes.modal')
  @endforeach

    <tbody>
    </tbody>
  </table>
  </div>
</div>
@endsection