@extends('adminlte::page')
@section('title','Nuevo producto')
@section('content_header')
<h1>Nuevo producto</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
          {!! Form::open(['route'=>'control.administrador.productos.catalogos.store','method'=>'post']) !!}
          {{-- @if (isset($catalogo))
          <input type="hidden" value="{{ $catalogo->id }}" name="catalogo_d">
          @endif --}}
          <div class="col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">
                    {!! Form::label(null, 'nombre', [null]) !!}
                    {!! Form::text('nombre', $catalogo->nombre, ['class' => 'form-control']) !!}
                    {!! Form::label(null, 'precio', [null]) !!}
                    {!! Form::number('precio', $catalogo->precio, ['class'=> 'form-control']) !!}
                    {!! Form::label(null, 'categoria', [null]) !!}
                    {!! Form::select('categoria_id', $categoria, null, ['class'=>'form-control','id'=>'categoria_id']) !!}
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