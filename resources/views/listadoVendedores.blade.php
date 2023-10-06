<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedores</title>
</head>
<body>
    <h1>Listado de Vendedores</h1>
    <ul>
        @foreach($vendedores as $vendedor)
        <li>
            {{$vendedor->nombre_usuario}}
            <a href="{{ route('Vendedor.show', $vendedor->id_vendedor) }}">Ver</a>
            <a href="{{ route('Vendedor.edit', $vendedor->id_vendedor) }}">Editar</a>
            <form action="{{ route('Vendedor.destroy', $vendedor->id_vendedor) }}" method="POST">
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