<x-layouts.adminp title="Crear Comprador">


    <h1>Listado de Compradores</h1>
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