@extends('adminlte::page')
@section('title','Editar cliente')
@section('content_header')
<h1>Editar cliente</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
        {!! Form::model($cliente,['route'=>['control.vendedor.clientes.update', $cliente->id],'method'=>'put']) !!}
        <p>Editar cliente</p>
        {!! Form::label(null, 'nombre', [null]) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'DNI/RUC', [null]) !!}
        {!! Form::text('dniRuc', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'direccion', [null]) !!}
        {!! Form::text('direccion', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'telefono', [null]) !!}
        {!! Form::text('telefono', null, ['class'=>'form-control']) !!}
        <button type="submit">Guardar</button>
        {!! Form::close() !!}
@stop