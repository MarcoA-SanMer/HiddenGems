<x-layouts.adminp title="Editar Vendedor">
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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <a href="{{ route('Vendedor.index') }}">Volver al listado de vendedores</a>
</x-layouts.adminp>