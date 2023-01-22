@extends('adminlte::page')
@section('title','Editar producto')
@section('content_header')
<h1>Editar producto</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
        {!! Form::model($catalogo,['route'=>['control.administrador.productos.catalogos.update', $catalogo->id],'method'=>'put']) !!}
        <p>Editar producto</p>
        {!! Form::label(null, 'nombre', [null]) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
        {!! Form::label(null,'precio', [null]) !!}
        {!! Form::number('precio', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'categoria_id', [null]) !!}
        {!! Form::select('categoria_id',$categoria, null, ['class'=>'form-control','id'=>'categoria_id']) !!}
        <button type="submit">Guardar</button>
        {!! Form::close() !!}
@stop