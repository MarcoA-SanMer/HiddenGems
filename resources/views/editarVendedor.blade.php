<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vendedor</title>
</head>
<body>
    <h1>Editar Vendedor</h1>

    <form action="{{ route('Vendedor.update', $vendedor->id_vendedor) }}" method="post">
        @csrf
        @method('PATCH')

        <label for="nombrec">Nombre Completo:</label><br>
        <input type="text" id="nombreC" name="nombreC" value="{{ $vendedor->nombre_completo }}"><br>

        <label for="nombreU">Nombre Usuario:</label><br>
        <input type="text" id="nombreU" name="nombreU" value="{{ $vendedor->nombre_usuario }}"><br>

        <label for="pass">Contraseña:</label><br>
        <input type="password" id="pass" name="pass"><br>

        <label for="marca">Marca:</label><br>
        <input type="text" id="marca" name="marca" value="{{ $vendedor->nombre_marca }}"><br><br>

        <label for="cal">Calificacion:</label><br>
        <input type="text" id="cal" name="cal" value="{{ $vendedor->calificacion }}"><br><br>


        <input type="submit" value="Editar Vendedor">
    </form>

    <a href="{{ route('Vendedor.index') }}">Volver al listado de productos</a>
</body>
</html>