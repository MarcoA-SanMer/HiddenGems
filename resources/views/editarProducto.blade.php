<x-layouts.mainLayout>
    <div class="container">
        <h1 class="my-3">Editar Producto</h1>

        <form action="{{ route('Producto.update', $producto->id) }}" method="post" enctype="multipart/form-data" class="mb-3">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ $producto->Nombre }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="precio" value="{{ $producto->Precio }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control">{{ $producto->Descripción }}</textarea>
            </div>

            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select id="categoria" name="categoria" class="form-control">
                    <option value="casual" {{ $producto->Categoria == 'casual' ? 'selected' : '' }}>Casual</option>
                    <option value="formal" {{ $producto->Categoria == 'formal' ? 'selected' : '' }}>Formal</option>
                    <option value="deportivo" {{ $producto->Categoria == 'deportivo' ? 'selected' : '' }}>Deportivo</option>
                </select>
            </div>

            {{-- Mostrar la imagen actual del producto --}}
            @if($producto->imagen_nombre)
                <img src="{{ asset('storage/imagenes/' . $producto->imagen_nombre) }}" alt="Imagen actual del Producto" width="210" height="210" class="img-thumbnail my-3"><br>
            @endif

            {{-- Campo para cargar nueva imagen --}}
            <div class="form-group">
                <label for="nueva_imagen">Cambiar Imagen:</label>
                <input type="file" id="nueva_imagen" name="nueva_imagen" class="form-control-file">
            </div>

            <input type="submit" value="Editar Producto" class="btn btn-primary">
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
        <a href="{{ route('misproductos') }}" class="btn btn-secondary">Volver al listado de productos</a>
    </div>
</x-layouts.mainLayout>