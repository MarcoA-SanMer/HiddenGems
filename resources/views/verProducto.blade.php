<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Producto</title>
</head>
<body>
    <h1>Ver Producto</h1>

    <p><strong>Nombre:</strong> {{ $producto->Nombre }}</p>
    <p><strong>Precio:</strong> {{ $producto->Precio }}</p>
    <p><strong>Descripción:</strong> {{ $producto->Descripción }}</p>
    <p><strong>Categoría:</strong> {{ $producto->Categoria }}</p>

    <a href="{{ route('Producto.index') }}">Volver al listado de productos</a>
</body>
</html>
