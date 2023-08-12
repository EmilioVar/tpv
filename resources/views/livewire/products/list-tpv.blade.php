<table class="table-auto">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
      </tr>
    </thead>
    <tbody>
        @foreach($productsTpv as $productTpv)
      <tr>
        <td>{{ $productTpv->id }}</td>
        <td>{{ $productTpv->name }}</td>
        <td>{{ $productTpv->price }}</td>
        <td>{{ $productTpv->pivot->quantity }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>