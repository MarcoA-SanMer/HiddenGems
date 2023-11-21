<x-layouts.mainLayout>
    <div class="container">
        <h1 class="my-3">Ver Producto</h1>

        <div class="card mb-3">
            <div class="card-body">
                <p><strong>Nombre:</strong> {{ $producto->Nombre }}</p>
                <p><strong>Precio:</strong> {{ $producto->Precio }}</p>
                <p><strong>Descripción:</strong> {{ $producto->Descripción }}</p>
                <p><strong>Categoría:</strong> {{ $producto->Categoria }}</p>

                {{-- Mostrar la imagen si existe --}}
                @if($producto->imagen_nombre)
                    <img src="{{ asset('storage/imagenes/' . $producto->imagen_nombre) }}" alt="Imagen del Producto"  width="210" height="210" class="img-thumbnail my-3">
                @else
                    <p>No hay imagen disponible</p>
                @endif
            </div>
        </div>

        <a href="{{ route('Producto.index') }}" class="btn btn-secondary">Volver al listado de productos</a>
    </div>
</x-layouts.mainLayout>