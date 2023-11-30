<x-layouts.mainLayout>
    <div class="container">
        <h1>Colaborar con más vendedores</h1>
        <br>
        <h4><b>Producto:</b> {{ $producto->Nombre }}</h4>

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

        <form method="post" action="{{ route('Producto.colaborate')}}" class="mb-3">
            @csrf
            <div class="form-group">
            <label for="id_vendedor">Id del vendedor</label><br>
            <input type="number" name="id_vendedor" id="id" class="form-control" required>
            </div>
            <input type="hidden" name="id_producto" value="{{ $producto->id }}"><br>
            <button type="submit" class="btn btn-success btn-sm">Colaborar con él</button>
        </form>

    </div>
</x-layouts.mainLayout>