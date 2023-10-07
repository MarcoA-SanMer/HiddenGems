<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comprador</title>
</head>
<body>
    <h1>Editar Comprador</h1>

    <form action="{{ route('Comprador.update', $comprador->Id_comprador) }}" method="post">
        @csrf
        @method('PATCH')

        <label for="nombreco">Nombre completo:</label><br>
        <input type="text" id="nombreco" name="nombreco" value="{{ $comprador->Nombre_completo }}"><br>

        <label for="nombreus">Nombre usuario:</label><br>
        <input type="text" id="nombreus" name="nombreus" value="{{ $comprador->Nombre_usuario }}"><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="text" id="contrasena" name="contrasena" value="{{ $comprador->Contrasena }}"><br>

        <input type="submit" value="Editar Comprador">
    </form>

    <a href="{{ route('Comprador.index') }}">Volver al listado de compradors</a>
</body>
</html>
