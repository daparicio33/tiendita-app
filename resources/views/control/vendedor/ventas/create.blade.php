@extends('adminlte::page')
@section('title','Nueva venta')
@section('content_header')
<h1>Nueva venta</h1>
@stop
@section('content')

{!! Form::open(['route'=>'control.vendedor.ventas.create','method'=>'get','role'=>'search']) !!}
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="input-group mb-3 col-md-3  col-sm-12 col-md-3">
          <input type="text" name="search_dni"  class="form-control" placeholder="ingrese dni para buscar">
          <div class="input-group-prepend">
            <button class="btn btn-outline-primary" id="btn_search" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
        <div class="row">
          @if (isset($cliente))
          <input type="hidden" value="{{ $cliente->id }}" name="">
            <div class="col-sm-12 col-md-3">
              <label for="">Nombre</label>
              {!! Form::text('nombre', $cliente->nombre, ['class'=>'form-control']) !!}
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="">Telefono</label>
              {!! Form::text('telefono', $cliente->telefono, ['class'=>'form-control']) !!}
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="">Direccion</label>
              {!! Form::text('direccion', $cliente->direccion, ['class'=>'form-control']) !!}
            </div>
            @endif
        </div>
        
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}

{!! Form::open(['route'=>'control.vendedor.ventas.store','method'=>'post']) !!}
<div class='row'>
  <div class="col-sm-12">
     <div class="card">
      <div class="card-body">
        
        <div class="row">
           <div class="col-sm-12 col-md-3">
            {!! Form::label(null, 'fecha', [null]) !!}
            {!! Form::date('fecha', $venta->fecha, ['class'=>'form-control']) !!}
          </div>
          
          <div class="col-sm-12 col-md-3">
            {!! Form::label(null, 'tipo de pago', [null]) !!}
            {!! Form::select('mpago_id', $mpago, null, ['class'=>'form-control', 'id'=>'mpago_id']) !!}
          </div>
          
          <div class="col-sm-12 col-md-5">
            {!! Form::label(null, 'Tipo de comprobante', [null]) !!}
            {!! Form::select('tipoComprobante', $comprobante, null,['class'=>'form-control'] ,['placeholder' => 'Seleccione una opción']) !!}

          </div>              
        </div>
      <div class="row">
        <div class="col-sm-12 col-md-8">
          {!! Form::label('catalogo', 'Producto', [null]) !!}

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button class="btn btn-outline-primary" id="btn_add" type="button"><i class="fas fa-plus"></i></button>
            </div>
            <select id="catalogo"  class="form-control" aria-label="Example select with button addon">
              <option id="option" selected value="0">Elija...</option>
              @foreach ($catalogos as $catalogo)
                <option value="{{ $catalogo->id }}" >{{ $catalogo->nombre }} - {{ $catalogo->precio }}</option>
              @endforeach
            </select>
          </div>

          
        </div>
        <div class="col-ms-12">
          {!! Form::text('cantidad', null, ['class'=>'form-control','id'=>'cantidad', 'style' => 'display: none'])  !!}
        </div>
        <div class="col-ms-12 col-md-1">
          {!! Form::label('cantidad', 'Cant.', [null]) !!}
          {!! Form::text(null, null, ['class'=>'form-control','id'=>'cantidad1', ]) !!}
        </div>
        <div class="col-ms-12 col-md-1">
          {!! Form::label(null, 'Precio', [null]) !!}
          {!! Form::text('precio', $venta->precio, ['class'=>'form-control','id'=>'precio']) !!}
        </div>
        <div class="col-ms-12 col-md-2">
          {!! Form::label(null, 'total', [null]) !!}
          {!! Form::label('total', $venta->total, ['class'=>'form-control','id'=>'total-label']) !!}
        </div>
      </div>
      </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
        <table class="table-hover table-dark">
          <thead>
              <tr>
                  <th style="width: 4rem"></th>
                  <th>Cantidad</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Subtotal</th>
                  
                 {{--  <th></th> --}}
              </tr>
          </thead>
          <tbody id="cuerpo">
          </tbody>
        </table>
    </div>
   
  </div>
<div class="card-footer">
  {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
</div>
{!! Form::close() !!}

@stop
@section('js')
<script>
  const btn = document.getElementById('btn_add');
  btn.addEventListener('click', function(){
  const select = document.getElementById('catalogo');
  const id = select.value;
  const text = select.options[select.selectedIndex].text;
  const txt_cantidad = document.getElementById('cantidad1');
  const txt_precio = document.getElementById('precio');
  let data = text.split('-');
  //creamos la fila
  let row = document.createElement('tr');
  row.id = select.value;
  let c_btn = document.createElement('td');
  //crear botton
  let btn_eliminar = document.createElement('a');
  btn_eliminar.innerHTML="X";
  btn_eliminar.setAttribute('class', 'btn btn-danger');
  btn_eliminar.setAttribute('onClick', 'eliminar('+select.value+')');
  c_btn.appendChild(btn_eliminar);
  let cantidad = document.createElement('td');
  //nombre para la columna cantidad
  cantidad.id = 'cant_'+select.value;
  let nombre = document.createElement('td');
  let precio = document.createElement('td');
  precio.id = 'pre_'+select.value;
  let subtotal = document.createElement('td');
  subtotal.id = 'subt_'+select.value;
  cantidad.innerHTML= txt_cantidad.value;
  const cantidad_id = document.createElement('input');
  cantidad_id.type = "hidden";
  cantidad_id.name = "cantidad_id[]";
  cantidad_id.value = txt_cantidad.value;
  nombre.innerHTML = data[0];
  //Se crea un input dentro de una variable
  const catalogo_id = document.createElement('input');
  //Se le da atributos
  catalogo_id.type="hidden";
  catalogo_id.name = "catalogo_id[]";
  catalogo_id.value = select.value;
  //Aqui se agrega el input
  nombre.appendChild(catalogo_id);
  cantidad.appendChild(cantidad_id);
  precio.innerHTML = txt_precio.value;
  const precio_id = document.createElement('input');
  precio_id.type = 'hidden';
  precio_id.name = 'precio_id[]';
  precio_id.value = txt_precio.value;
  precio.appendChild(precio_id);
  row.appendChild(c_btn);
  row.appendChild(cantidad);
  row.appendChild(nombre);
  row.appendChild(precio);
  row.appendChild(subtotal);
   let tabla = document.getElementById('cuerpo');
   let contadd = [];
  //verificar si el producto ya esta en la tabla
  let verificar = document.getElementById(select.value);
  if(verificar){
    let c_cantidad = document.getElementById("cant_"+select.value);
    c_cantidad.innerHTML = parseInt(c_cantidad.innerHTML) + parseInt(txt_cantidad.value);
    let subto = document.getElementById("subt_"+select.value);
    subto.innerHTML = parseInt(c_cantidad.innerHTML) * parseInt(txt_precio.value);
    contadd.push(c_cantidad.innerHTML);
    console.log(contadd)
  }else{
    
    
    tabla.appendChild(row);
    contadd = 1;
    let subto = document.getElementById("subt_"+select.value);
    subto.innerHTML = parseInt(txt_precio.value);
  }

  let subtotalCells = document.querySelectorAll("[id^='subt_']");
  let total = 0;

    for (let i = 0; i < subtotalCells.length; i++) {
    total += parseInt(subtotalCells[i].innerHTML);
    document.getElementById("total-label").innerHTML = total;

    
  }
  document.getElementById("cantidad").value = contadd;


  

});

  const catalogos = document.getElementById('catalogo');
  catalogos.addEventListener('change', function(){
  const cant = document.getElementById('cantidad1');
  const pre = document.getElementById('precio');
  contadd = document.getElementById('cantidad');
  text = this.options[this.selectedIndex].text;
  data = text.split('-');
  cant.value = 1;
  pre.value = data[1];
  contadd.value = 1
  });

  function eliminar(id){
    let row = document.getElementById(id);
    let subtotal = document.getElementById("subt_"+id).innerHTML;
    let total = document.getElementById("total-label").innerHTML;
    document.getElementById("total-label").innerHTML = total - subtotal;
    row.remove();
}

</script>
@stop