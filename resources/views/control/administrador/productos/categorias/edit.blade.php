@extends('adminlte::page')
@section('title','Editar categoria')
@section('content_header')
<h1>Editar categoria</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
        {!! Form::model($categoria,['route'=>['control.administrador.productos.categorias.update', $categoria->id],'method'=>'put']) !!}
        <p>Editar categoria</p>
        {!! Form::label(null, 'nombre', [null]) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
        <button type="submit">Guardar</button>
        {!! Form::close() !!}
@stop