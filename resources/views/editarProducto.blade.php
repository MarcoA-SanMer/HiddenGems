<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>

    <form action="{{ route('Producto.update', $producto->Id_producto) }}" method="post">
        @csrf
        @method('PATCH')

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="{{ $producto->Nombre }}"><br>

        <label for="precio">Precio:</label><br>
        <input type="text" id="precio" name="precio" value="{{ $producto->Precio }}"><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion">{{ $producto->Descripción }}</textarea><br>

        <label for="categoria">Categoría:</label><br>
        <select id="categoria" name="categoria">
            <option value="casual" {{ $producto->Categoria == 'casual' ? 'selected' : '' }}>Casual</option>
            <option value="formal" {{ $producto->Categoria == 'formal' ? 'selected' : '' }}>Formal</option>
            <option value="deportivo" {{ $producto->Categoria == 'deportivo' ? 'selected' : '' }}>Deportivo</option>
        </select><br>

        <input type="submit" value="Editar Producto">
    </form>

    <a href="{{ route('Producto.index') }}">Volver al listado de productos</a>
</body>
</html>
