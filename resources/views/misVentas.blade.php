<x-layouts.mainLayout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="display-4">Mis Ventas</h1>
                @if($productos->isEmpty())
                    <p>Aún no has vendido ningún producto.</p>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Ventas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->Nombre }}</td>
                                    <td>{{ $producto->compras->count() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                <!-- Botón Regresar -->
                <a href="{{ route('allproducts') }}" class="btn btn-primary mt-3">Regresar</a>
            </div>
        </div>
    </div>

</x-layouts.mainLayout>
