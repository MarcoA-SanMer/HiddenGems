<x-layouts.mainLayout>
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                
                {{-- Mostrar la imagen si existe --}}
                @if($producto->imagen_nombre)
                    <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/imagenes/' . $producto->imagen_nombre) }}" alt="Imagen del Producto" >
                @else
                    <p>No hay imagen disponible</p>
                @endif
                </div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder">{{ $producto->Nombre }}</h1>
                        <div class="fs-5 mb-5">
                            <p old-currency="MXN" class="fs-5 mb-5" id="productPrice_{{ $producto->id }}" style="display: inline;">Precio: {{ $producto->Precio }}</p><p id="tipoMoneda" style="display: inline;"> MXN</p>
                        </div>
                        <p class="fs-5 mb-5">Categoría: {{ $producto->Categoria }}</p>
                        <p class="fs-5 mb-5" >Descripcion:</p>
                        <p class="lead">{{ $producto->Descripción }}</p>
                        <div class="d-flex">
                            <form action="{{ url('/Comprar/' . $producto->id) }}" method="post" class="needs-validation" novalidate>
                                @csrf
                                <div class="text-center my-4">
                                    <button type="submit" class="btn btn-dark">COMPRAR</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.mainLayout>