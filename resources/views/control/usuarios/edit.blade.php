@extends('adminlte::page')
@section('title','Editar usuario')
@section('content_header')
<h1>Editar usuario</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
        {!! Form::model($user,['route'=>['control.usuarios.update', $user->id],'method'=>'put']) !!}
        <p>Editar usuario</p>
        {!! Form::label(null, 'nombre', [null]) !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'email', [null]) !!}
        {!! Form::email('email', $user->email, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'contraseña', [null]) !!}
        {!! Form::text('password', null, ['class'=>'form-control']) !!}
        <button type="submit">Guardar</button>
        {!! Form::close() !!}
@stop