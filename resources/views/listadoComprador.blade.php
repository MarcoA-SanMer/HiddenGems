<x-layouts.adminp title="Compradores">
<h1>Listado de Compradores</h1>
    <ul>
        @foreach($compradors as $comprador)
        <li>
            {{$comprador->Nombre_usuario}}
            <a href="{{ route('Comprador.show', $comprador->Id_comprador) }}">Ver</a>
            <a href="{{ route('Comprador.edit', $comprador->Id_comprador) }}">Editar</a>
            <form action="{{ route('Comprador.destroy', $comprador->Id_comprador) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Borrar</button>
        </form>
        <br>
        </li>
        @endforeach
    </ul>
</x-layouts.adminp>