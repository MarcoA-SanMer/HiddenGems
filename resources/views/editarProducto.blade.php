<x-layouts.adminp title="Editar Producto">
    <h1>Editar Producto</h1>

    <form action="{{ route('Producto.update', $producto->Id_producto) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="{{ $producto->Nombre }}"><br>

        <label for="precio">Precio:</label><br>
        <input type="text" id="precio" name="precio" value="{{ $producto->Precio }}"><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion">{{ $producto->Descripción }}</textarea><br>

        <label for="categoria">Categoría:</label><br>
        <select id="categoria" name="categoria">
            <option value="casual" {{ $producto->Categoria == 'casual' ? 'selected' : '' }}>Casual</option>
            <option value="formal" {{ $producto->Categoria == 'formal' ? 'selected' : '' }}>Formal</option>
            <option value="deportivo" {{ $producto->Categoria == 'deportivo' ? 'selected' : '' }}>Deportivo</option>
        </select><br>

        {{-- Mostrar la imagen actual del producto --}}
        @if($producto->imagen_nombre)
            <img src="{{ asset('storage/imagenes/' . $producto->imagen_nombre) }}" alt="Imagen actual del Producto" width="210" height="210"><br>
        @endif

        {{-- Campo para cargar nueva imagen --}}
        <label for="nueva_imagen">Cambiar Imagen:</label><br>
        <input type="file" id="nueva_imagen" name="nueva_imagen"><br>

        <input type="submit" value="Editar Producto">
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
    <a href="{{ route('Producto.index') }}">Volver al listado de productos</a>

</x-layouts.adminp>