@extends('adminlte::page')
@section('title','Nuevo cliente')
@section('content_header')
<h1>Nuevo cliente</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
          {!! Form::open(['route'=>'control.vendedor.clientes.store','method'=>'post']) !!}
          {{-- @if (isset($proveedore))
          <input type="hidden" value="{{ $proveedore->id }}" name="catalogo_d">
          @endif --}}
          <div class="col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">
                {!! Form::label(null, 'nombre', [null]) !!}
                {!! Form::text('nombre', $cliente->nombre, ['class' => 'form-control']) !!}
                {!! Form::label(null, 'DNI/RUC', [null]) !!}
                {!! Form::text('dniRuc', $cliente->dniRuc, ['class'=>'form-control']) !!}
                {!! Form::label(null, 'direccion', [null]) !!}
                {!! Form::text('direccion', $cliente->direccion, ['class'=>'form-control']) !!}
                {!! Form::label(null, 'telefono', [null]) !!}
                {!! Form::text('telefono', $cliente->telefono, ['class'=>'form-control']) !!}
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