@extends('adminlte::page')
@section('title','Editar proveedor')
@section('content_header')
<h1>Editar proveedor</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
        {!! Form::model($proveedore,['route'=>['control.administrador.compras.proveedores.update', $proveedore->id],'method'=>'put']) !!}
        <p>Editar proveedor</p>
        {!! Form::label(null, 'nombre', [null]) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'Ruc', [null]) !!}
        {!! Form::text('Ruc', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'contacto', [null]) !!}
        {!! Form::text('contacto', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'direccion', [null]) !!}
        {!! Form::text('direccion', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'telefono', [null]) !!}
        {!! Form::number('telefono', null, ['class'=>'form-control']) !!}
        <button type="submit">Guardar</button>
        {!! Form::close() !!}
@stop