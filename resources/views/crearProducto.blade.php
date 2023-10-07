<x-layouts.adminp title="Crear Producto">
    <h1>Crear Producto</h1>

        @php
            $selectedCategoria = old('categoria');
        @endphp

    <form action="{{ route('Producto.store') }}" method="post">
        @csrf

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"><br>

        <label for="precio">Precio:</label><br>
        <input type="text" id="precio" name="precio" value="{{ old('precio') }}"><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea><br>

        <label for="categoria">Categoría:</label><br>
        <select id="categoria" name="categoria">
            <option value="casual" {{ $selectedCategoria == 'casual' ? 'selected' : '' }}>Casual</option>
            <option value="formal" {{ $selectedCategoria == 'formal' ? 'selected' : '' }}>Formal</option>
            <option value="deportivo" {{ $selectedCategoria == 'deportivo' ? 'selected' : '' }}>Deportivo</option>
        </select><br>

        <input type="submit" value="Crear Producto">
    </form>

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

</x-layouts.adminp>