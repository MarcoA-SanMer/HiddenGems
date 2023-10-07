<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Comprador</title>
</head>
<body>
    <h1>Ver Comprador</h1>

    <p><strong>Nombre:</strong> {{ $comprador->Nombre_completo }}</p>
    <p><strong>Precio:</strong> {{ $comprador->Nombre_usuario }}</p>

    <a href="{{ route('Comprador.index') }}">Volver al listado de productos</a>
</body>
</html>
