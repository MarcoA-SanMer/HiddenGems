<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de la página</title>
    <!-- Agrega aquí tus enlaces a hojas de estilo (CSS) y otros metadatos si es necesario -->
</head>
<body>
    @foreach($productos as $producto)
        <form action="{{ url('/Comprar/' . $producto->Id_producto) }}" method="post">
            @csrf
            <input type="hidden" name="producto_id" value="{{ $producto->Id_producto }}">
            <h2>{{ $producto->Nombre }}</h2>
            <p>Precio: ${{ $producto->Precio }}</p>
            <p>{{ $producto->Descripción }}</p>
            <p>Categoría: {{ $producto->Categoria }}</p>
            <button type="submit">Comprar</button>
        </form>
        <hr>
    @endforeach
</body>
</html>
