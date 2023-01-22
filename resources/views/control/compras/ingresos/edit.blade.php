@extends('adminlte::page')
@section('title','Editar compra')
@section('content_header')
<h1>Editar compra</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
        {!! Form::model($ingreso,['route'=>['control.compras.ingresos.update', $ingreso->id],'method'=>'put']) !!}
        <p>Editar proveedor</p>
        {!! Form::label(null, 'fecha', [null]) !!}
        {!! Form::text('fecha', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'usuario', [null]) !!}
        {!! Form::select('user_id', $user, null, ['class'=>'form-control','id'=>'user_id']) !!}
        {!! Form::label(null, 'proveedor', [null]) !!}
        {!! Form::select('proveedore_id', $proveedore, null, ['class'=>'form-control','id'=>'proveedore_id']) !!}
        {!! Form::label(null, 'codComprobante', [null]) !!}
        {!! Form::text('codComprobante', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'tipoComprobante', [null]) !!}
        {!! Form::number('tipoComprobante', null, ['class'=>'form-control']) !!}
        <button type="submit">Guardar</button>
        {!! Form::close() !!}
@stop