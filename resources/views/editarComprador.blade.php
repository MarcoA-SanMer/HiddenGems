<x-layouts.adminp title="Editar Comprador">
    <h1>Editar Comprador</h1>

    <form action="{{ route('Comprador.update', $comprador->Id_comprador) }}" method="post">
        @csrf
        @method('PATCH')

        <label for="nombreco">Nombre completo:</label><br>
        <input type="text" id="nombreco" name="nombreco" value="{{ $comprador->Nombre_completo }}"><br>

        <label for="nombreus">Nombre usuario:</label><br>
        <input type="text" id="nombreus" name="nombreus" value="{{ $comprador->Nombre_usuario }}"><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="text" id="contrasena" name="contrasena"><br>

        <input type="submit" value="Editar Comprador">
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <a href="{{ route('Comprador.index') }}">Volver al listado de compradores</a>
</x-layouts.adminp>
