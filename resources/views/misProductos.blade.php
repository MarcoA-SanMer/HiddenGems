<x-layouts.mainLayout>

    <div class="container">
        <h1 class="my-3">Listado de Productos</h1>
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
        </ul> 
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