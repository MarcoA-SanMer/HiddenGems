<x-layouts.adminp title="Ver Producto">
    <h1>Ver Producto</h1>

    <p><strong>Nombre:</strong> {{ $producto->Nombre }}</p>
    <p><strong>Precio:</strong> {{ $producto->Precio }}</p>
    <p><strong>Descripción:</strong> {{ $producto->Descripción }}</p>
    <p><strong>Categoría:</strong> {{ $producto->Categoria }}</p>

    {{-- Mostrar la imagen si existe --}}
    @if($producto->imagen_nombre)
        <img src="{{ asset('storage/imagenes/' . $producto->imagen_nombre) }}" alt="Imagen del Producto"  width="210" height="210">
    @else
        <p>No hay imagen disponible</p>
    @endif

    <a href="{{ route('Producto.index') }}">Volver al listado de productos</a>

</x-layouts.adminp>
