<x-layouts.mainLayout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="display-4">Listado de Compras</h1>
                @if($compras->isEmpty())
                    <p>Aún no hay compras.</p>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compras as $compra)
                                <tr>
                                    <td>{{ $compra->nombre_compra }}</td>
                                    <td>{{ $compra->precio }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('borrarcompra.destroy', $compra->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
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