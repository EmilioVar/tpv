<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>ticket</title>
</head>

<body>
    {{ $ticket }}
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['pivot']['price'] }}</td>
                    <td>{{ $product['pivot']['quantity'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h4>Total: <strong>{{ $ticket->total_ticket }}</strong></h4>
</body>

</html>
