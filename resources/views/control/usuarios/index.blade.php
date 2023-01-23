@extends('adminlte::page')
@section('title','Usuarios')
@section('content_header')
  <h1>Lista de usuarios</h1>
@stop 
@section('content')
<div class='card'>
  <div class='card-header'>
    <h5>Todos los usuarios</h5>
    <a href="{{route('control.usuarios.create')}}">
      <button class='btn btn-primary'>
        <i class='fas fa-folder-open'></i> Registrar nuevo usuario
      </button>
    </a>
  </div>
  @include('layouts.info')
  <div class='card-body'>
    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Contraseña</th>
        </tr>
      </thead>
    <tbody>
@foreach ($users as $user)
  <tr>
    <td>{{$user->name}}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->password}}</td>
   <td style="text-align: center; width: 160px">
    <td>
      <a href="{{ route('control.usuarios.edit', $user->id) }}">
        <button class="btn btn-primary">
            <i class="far fa-edit"></i> Editar
        </button>
      </a>
    </td>
    <td>
      <a data-toggle="modal" data-target="#modal-delete-{{ $user->id }}">
         <button class="btn btn-danger">
           <i class="fas fa-trash-alt"></i> Eliminar
         </button>
      </a>
    </td>
  </tr>
  @include('control.usuarios.modal')
  @endforeach

    <tbody>
    </tbody>
  </table>
  </div>
</div>
@endsection