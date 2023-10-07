<x-layouts.adminp title="Crear Comprador">
    <h1>Crear Comprador</h1>

    <form action="{{ route('Comprador.store') }}" method="post">
        @csrf

        <label for="nombreco">Nombre Completo:</label><br>
        <input type="text" id="nombreco" name="nombreco" value="{{ old('nombreco') }}"><br>

        <label for="nombreus">Nombre Usuario:</label><br>
        <input type="text" id="nombreus" name="nombreus" value="{{ old('nombreus') }}"><br>

        <label for="contrasena">Contrasena:</label><br>
        <input type="text" id="contrasena" name="contrasena" value="{{ old('contrasena') }}"><br>

        <input type="submit" value="Crear Comprador">
    </form>
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
</x-layouts.adminp>