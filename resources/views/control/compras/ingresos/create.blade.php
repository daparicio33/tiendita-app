@extends('adminlte::page')
@section('title','Nueva compra')
@section('content_header')
<h1>Nueva compra</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
          {!! Form::open(['route'=>'control.compras.ingresos.store','method'=>'post']) !!}
          {{-- @if (isset($proveedore))
          <input type="hidden" value="{{ $proveedore->id }}" name="catalogo_d">
          @endif --}}
          <div class="col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">
                    {!! Form::label(null, 'fecha', [null]) !!}
                    {!! Form::date('fecha', $ingreso->fecha, ['class' => 'form-control']) !!}
                    {!! Form::label(null, 'usuario', [null]) !!}
                    {!! Form::select('user_id', $user, null, ['class'=>'form-control','id'=>'user_id']) !!}
                    {!! Form::label(null, 'proveedor', [null]) !!}
                    {!! Form::select('proveedore_id', $proveedore, null, ['class'=>'form-control','id'=>'proveedore_id']) !!}
                    {!! Form::label(null, 'codComprobante', [null]) !!}
                    {!! Form::select('codComprobante', $ingreso->codComprobante, ['class'=> 'form-control']) !!}
                    {!! Form::label(null, 'tipoComprobante', [null]) !!}
                    {!! Form::text('tipoComprobante', $ingreso->tipoComprobante, ['class'=> 'form-control']) !!}
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