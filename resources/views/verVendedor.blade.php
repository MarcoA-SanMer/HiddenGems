<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Vendedor</title>
</head>
<body>
    <h1>Ver Vendedor</h1>

    <p><strong>Nombre de Usuario:</strong> {{ $vendedor->nombre_usuario }}</p>
    <p><strong>Nombre Completo:</strong> {{ $vendedor->nombre_completo }}</p>
    <p><strong>Marca:</strong> {{ $vendedor->nombre_marca }}</p>
    <p><strong>Calificacion:</strong> {{ $vendedor->calificacion }}</p>

    <a href="{{ route('Vendedor.index') }}">Volver al listado de vendedores</a>
</body>
</html>