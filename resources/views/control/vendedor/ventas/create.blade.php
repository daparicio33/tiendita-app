@extends('adminlte::page')
@section('title','Nueva venta')
@section('content_header')
<h1>Nueva venta</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
      {!! Form::open(['route'=>'control.vendedor.ventas.store','method'=>'post']) !!}
          {{-- @if (isset($proveedore))
          <input type="hidden" value="{{ $proveedore->id }}" name="catalogo_d">
          @endif --}}
          <div class="col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">
                {!! Form::label(null, 'fecha', [null]) !!}
                {!! Form::date('fecha', $venta->fecha, ['class'=>'form-control']) !!}
                {!! Form::label(null, 'cliente', [null]) !!}
                {!! Form::select('cliente_id', $cliente, null, ['class'=>'form-control', 'id'=>'cliente_id']) !!}
                {!! Form::label(null, 'tipo de pago', [null]) !!}
                {!! Form::select('mpago_id', $mpago, null, ['class'=>'form-control', 'id'=>'mpago_id']) !!}
                {!! Form::label(null, 'usuario', [null]) !!}
                {!! Form::select('user_id', $user, null, ['class'=>'form-control','id'=>'user_id']) !!}
                {!! Form::label(null, 'total', [null]) !!}
                {!! Form::number('total', $venta->total, ['class'=>'form-control']) !!}
                {!! Form::label(null, 'Codigo de comprobante', [null]) !!}
                {!! Form::text('codComprobante', $venta->codComprobante, ['class'=>'form-control']) !!}
                {!! Form::label(null, 'Tipo de comprobante', [null]) !!}
                {!! Form::text('tipoComprobante', $venta->tipoComprobante, ['class'=>'form-control']) !!}
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