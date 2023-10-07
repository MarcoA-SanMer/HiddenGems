<!DOCTYPE html>
<html>
<head>
    <title>Crear Comprador</title>
</head>
<body>
    <h1>Crear Comprador</h1>

    <form action="{{ route('Comprador.store') }}" method="post">
        @csrf

        <label for="nombreco">Nombre Completo:</label><br>
        <input type="text" id="nombreco" name="nombreco"><br>

        <label for="nombreus">Nombre Usuario:</label><br>
        <input type="text" id="nombreus" name="nombreus"><br>

        <label for="contrasena">Contrasena:</label><br>
        <input type="text" id="contrasena" name="contrasena"><br>

        <input type="submit" value="Crear Comprador">
    </form>
</body>
</html>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif