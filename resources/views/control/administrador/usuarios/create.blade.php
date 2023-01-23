@extends('adminlte::page')
@section('title','Nuevo usuario')
@section('content_header')
<h1>Nuevo usuario</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
          {!! Form::open(['route'=>'control.administrador.usuarios.store','method'=>'post']) !!}
          {{-- @if (isset($proveedore))
          <input type="hidden" value="{{ $proveedore->id }}" name="catalogo_d">
          @endif --}}
          <div class="col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">
                {!! Form::label(null, 'name', [null]) !!}
                {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                {!! Form::label(null, 'email', [null]) !!}
                {!! Form::email('email', $user->email, ['class'=>'form-control']) !!}
                {!! Form::label(null, 'contraseña', [null]) !!}
                {!! Form::text('password', $user->password, ['class'=>'form-control']) !!}
                </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary" type="submit">
                Guardar
            </button>
          </div>
        {!! Form::close() !!}
          </div>
     </div>
  </div>
</div>
@stop