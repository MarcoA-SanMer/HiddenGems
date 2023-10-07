<x-layouts.adminp title="Ver Producto">
    <h1>Ver Producto</h1>

    <p><strong>Nombre:</strong> {{ $producto->Nombre }}</p>
    <p><strong>Precio:</strong> {{ $producto->Precio }}</p>
    <p><strong>Descripción:</strong> {{ $producto->Descripción }}</p>
    <p><strong>Categoría:</strong> {{ $producto->Categoria }}</p>

    <a href="{{ route('Producto.index') }}">Volver al listado de productos</a>

</x-layouts.adminp>
