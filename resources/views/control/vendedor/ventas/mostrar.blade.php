<table class="table table-striped">
    <thead>
      <th>PRODUCTO</th>
      <th>CANTIDAD</th>
      <th>PRECIO</th>
    </thead>
    <tbody>
        @foreach ($vdetalle as $vdetalle)
        <td>{{ $vdetalle->catalogo->nombre }}</td>
        <td>{{ $vdetalle->cantidad }}</td>
        <td>{{ $vdetalle->precio }}</td>
        @endforeach
    </tbody>
</table>
   