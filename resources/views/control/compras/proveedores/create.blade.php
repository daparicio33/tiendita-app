@extends('adminlte::page')
@section('title','Nuevo proveedor')
@section('content_header')
<h1>Nuevo proveedor</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
          {!! Form::open(['route'=>'control.compras.proveedores.store','method'=>'post']) !!}
          {{-- @if (isset($proveedore))
          <input type="hidden" value="{{ $proveedore->id }}" name="catalogo_d">
          @endif --}}
          <div class="col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">
                    {!! Form::label(null, 'nombre', [null]) !!}
                    {!! Form::text('nombre', $proveedore->nombre, ['class' => 'form-control']) !!}
                    {!! Form::label(null, 'Ruc', [null]) !!}
                    {!! Form::number('Ruc', $proveedore->Ruc, ['class'=> 'form-control']) !!}
                    {!! Form::label(null, 'contacto', [null]) !!}
                    {!! Form::text('contacto', $proveedore->contacto, ['class'=> 'form-control']) !!}
                    {!! Form::label(null, 'direccion', [null]) !!}
                    {!! Form::text('direccion', $proveedore->direccion, ['class'=> 'form-control']) !!}
                    {!! Form::label(null, 'telefono', [null]) !!}
                    {!! Form::text('telefono', $proveedore->telefono, ['class'=> 'form-control']) !!}
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