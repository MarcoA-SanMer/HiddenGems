<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <h1>Listado de Productos</h1>
    <ul>
        @foreach($productos as $producto)
        <li>
            {{$producto->Nombre}}
            <a href="{{ route('Producto.show', $producto->Id_producto) }}">Ver</a>
            <a href="{{ route('Producto.edit', $producto->Id_producto) }}">Editar</a>
            <form action="{{ route('Producto.destroy', $producto->Id_producto) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Borrar</button>
        </form>
        <br>
        </li>
        @endforeach
    </ul>
</body>
</html>