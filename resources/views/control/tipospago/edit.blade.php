@extends('adminlte::page')
@section('title','Editar tipo de pago')
@section('content_header')
<h1>Editar tipo de pago</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
        {!! Form::model($mpago,['route'=>['control.tipospago.update', $mpago->id],'method'=>'put']) !!}
        <p>Editar tipo de pago</p>
        {!! Form::label(null, 'nombre', [null]) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
        <button type="submit">Guardar</button>
        {!! Form::close() !!}
@stop