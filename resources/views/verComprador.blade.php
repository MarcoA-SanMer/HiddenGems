<x-layouts.adminp title="Ver Comprador">
    <h1>Ver Comprador</h1>

    <p><strong>Nombre:</strong> {{ $comprador->Nombre_completo }}</p>
    <p><strong>Nombre de usuario:</strong> {{ $comprador->Nombre_usuario }}</p>

    <a href="{{ route('Comprador.index') }}">Volver al listado de productos</a>
</x-layouts.adminp>