@extends('adminlte::page')
@section('title','Nuevo producto')
@section('content_header')
<h1>Nuevo categoria</h1>
@stop
@section('content')
<div class='row'>
  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card">
  </div>
     <div class="card-body">
          {!! Form::open(['route'=>'control.administrador.productos.categorias.store','method'=>'post']) !!}
          {{-- @if (isset($categoria))
          <input type="hidden" value="{{ $categoria->id }}" name="categoria_d">
          @endif --}}
          <div class="col-sm-6 col-md-6 col-lg-6">
               <div class="form-group">
                    {!! Form::label(null, 'nombre', [null]) !!}
                    {!! Form::text('nombre', $categoria->nombre, ['class' => 'form-control']) !!}
                  </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary" type="submit">
                Guardar
            </button>
            </div>
          </div>
     </div>
  </div>
</div>
@stop