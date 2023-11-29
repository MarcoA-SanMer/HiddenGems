<x-layouts.mainLayout>
    <div class="container">
        <h1>Colaborar con más vendedores</h1>
        <br>
        <h4><b>Producto:</b> {{ $producto->Nombre }}</h4>

        <form method="post" action="{{ route('Producto.colaborate')}}">
            @csrf
            <label for="id_vendedor">Id del vendedor</label><br>
            <input type="number" name="id_vendedor" id="id">
            <input type="hidden" name="id_producto" value="{{ $producto->id }}">
            <button type="submit" class="btn btn-success btn-sm">Colaborar con él</button>
        </form>

    </div>
</x-layouts.mainLayout>