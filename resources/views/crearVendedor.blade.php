<!DOCTYPE html>
<html>
<head>
    <title>Crear Vendedor</title>
</head>
<body>
    <h1>Crear Vendedor</h1>

    <form action="{{ route('Vendedor.store') }}" method="post">
        @csrf

        <label for="nombrec">Nombre Completo:</label><br>
        <input type="text" id="nombreC" name="nombreC"><br>

        <label for="nombreU">Nombre Usuario:</label><br>
        <input type="text" id="nombreU" name="nombreU"><br>

        <label for="pass">Contraseña:</label><br>
        <input type="password" id="pass" name="pass"><br>

        <label for="marca">Marca:</label><br>
        <input type="text" id="marca" name="marca"><br><br>

        <label for="cal">Calificacion:</label><br>
        <input type="text" id="cal" name="cal"><br><br>

        <input type="submit" value="Crear Vendedor">
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