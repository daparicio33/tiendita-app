@extends('adminlte::page')
@section('title','Tipos de pago')
@section('content_header')
  <h1>Lista de tipos de pago</h1>
@stop 
@section('content')
<div class='card'>
  <div class='card-header'>
    <h5>Todos los tipos de pago</h5>
    <a href="{{route('control.tipospago.create')}}">
      <button class='btn btn-primary'>
        <i class='fas fa-folder-open'></i> Registrar nueva tipo de pago
      </button>
    </a>
  </div>
  <div class='card-body'>
    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
        </tr>
      </thead>
    <tbody>
@foreach ($mpagos as $mpago)
  <tr>
    <td>{{$mpago->nombre}}</td>
   <td style="text-align: center; width: 160px">
    <td>
      <a href="{{ route('control.tipospago.edit', $mpago->id) }}">
        <button class="btn btn-primary">
            <i class="far fa-edit"></i> Editar
        </button>
      </a>
    </td>
    <td>
      <a data-toggle="modal" data-target="#modal-delete-{{ $mpago->id }}">
         <button class="btn btn-danger">
           <i class="fas fa-trash-alt"></i> Eliminar
         </button>
      </a>
    </td>
  </tr>
  @include('control.tipospago.modal')
  @endforeach

    <tbody>
    </tbody>
  </table>
  </div>
</div>
@endsection