<x-layouts.mainLayout>

    <div class="container">
        {{-- <h1 class="my-3">Listado de Productos</h1>
        <ul class="list-group">
            @foreach($productos as $producto)
            <li class="list-group-item">
                {{$producto->Nombre}}
                <a href="{{ route('Producto.show', $producto->id) }}" class="btn btn-primary btn-sm">Ver</a>
                <a href="{{ route('Producto.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('Producto.destroy', $producto->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                </form>
            </li>
            @endforeach
        </ul> --}}
        
        <h1 class="my-3">Crear Producto</h1>

        @php
            $selectedCategoria = old('categoria');
        @endphp

        <form action="{{ route('Producto.store') }}" method="post" enctype="multipart/form-data" class="mb-3">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="precio" value="{{ old('precio') }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select id="categoria" name="categoria" class="form-control">
                    <option value="casual" {{ $selectedCategoria == 'casual' ? 'selected' : '' }}>Casual</option>
                    <option value="formal" {{ $selectedCategoria == 'formal' ? 'selected' : '' }}>Formal</option>
                    <option value="deportivo" {{ $selectedCategoria == 'deportivo' ? 'selected' : '' }}>Deportivo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen del Producto:</label>
                <input type="file" id="imagen" name="imagen" class="form-control-file">
            </div>

            <input type="submit" value="Crear Producto" class="btn btn-primary">
        </form>
    </div>

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

</x-layouts.mainLayout>