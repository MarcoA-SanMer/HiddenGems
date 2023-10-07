<x-layouts.adminp title="Ver Vendedor">
    <h1>Ver Vendedor</h1>

    <p><strong>Nombre de Usuario:</strong> {{ $vendedor->nombre_usuario }}</p>
    <p><strong>Nombre Completo:</strong> {{ $vendedor->nombre_completo }}</p>
    <p><strong>Marca:</strong> {{ $vendedor->nombre_marca }}</p>
    <p><strong>Calificacion:</strong> {{ $vendedor->calificacion }}</p>

    <a href="{{ route('Vendedor.index') }}">Volver al listado de vendedores</a>

</x-layouts.adminp>