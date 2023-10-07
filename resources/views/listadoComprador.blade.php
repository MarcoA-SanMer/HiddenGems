<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compradors</title>
</head>
<body>
    <h1>Listado de Compradors</h1>
    <ul>
        @foreach($compradors as $comprador)
        <li>
            {{$comprador->Nombre_usuario}}
            <a href="{{ route('Comprador.show', $comprador->Id_comprador) }}">Ver</a>
            <a href="{{ route('Comprador.edit', $comprador->Id_comprador) }}">Editar</a>
            <form action="{{ route('Comprador.destroy', $comprador->Id_comprador) }}" method="POST">
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