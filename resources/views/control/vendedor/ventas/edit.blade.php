@extends('adminlte::page')
@section('title','Editar venta')
@section('content_header')
<h1>Editar venta</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
        {!! Form::model($venta,['route'=>['control.vendedor.ventas.update', $venta->id],'method'=>'put']) !!}
        <p>Editar venta</p>
        {!! Form::label(null, 'fecha', [null]) !!}
        {!! Form::text('fecha', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'cliente', [null]) !!}
        {!! Form::select('cliente_id',$cliente, null, ['class'=>'form-control','id'=>'cliente_id']) !!}
        {!! Form::label(null, 'tipo de pago', [null]) !!}
        {!! Form::select('mpago_id',$mpago, null, ['class'=>'form-control','id'=>'mpago_id']) !!}
        {!! Form::label(null, 'usuario', [null]) !!}
        {!! Form::select('user_id',$user, null, ['class'=>'form-control','id'=>'user_id']) !!}
        {!! Form::label(null, 'total', [null]) !!}
        {!! Form::number('total', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'codigo de comprobante', [null]) !!}
        {!! Form::text('codComprobante', null, ['class'=>'form-control']) !!}
        {!! Form::label(null, 'tipo de comprobante', [null]) !!}
        {!! Form::text('tipoComprobante', null, ['class'=>'form-control']) !!}
        <button type="submit">Guardar</button>
        {!! Form::close() !!}
@stop