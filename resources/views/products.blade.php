<x-layouts.mainLayout>
<body>
<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        @foreach($productos as $producto)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    {{-- Mostrar la imagen si existe --}}
                    @if($producto->imagen_nombre)
                        <img src="{{ asset('storage/imagenes/' . $producto->imagen_nombre) }}" alt="Imagen del Producto">
                    @else
                        <img src="{{ asset('images/no_image.jpg')}}" alt="no hay imagen disponible">
                    @endif
                    <div class="card-body">
                        <form action="{{ url('/seeproduct/' . $producto->id) }}" method="post" class="needs-validation" novalidate>
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <h2 class="card-title">{{ $producto->Nombre }}</h2>
                            <p old-currency="MXN" class="card-text" id="productPrice_{{ $producto->id }}" style="display: inline;">Precio: {{ $producto->Precio }}</p><p id="tipoMoneda" style="display: inline;"> MXN</p>

                            {{-- <p class="card-text" >Descripcion:</p>
                            <textarea class="form-control" rows="3" readonly style="resize: none;">{{ $producto->Descripción }}
                            </textarea>
                            <br>
                            <p class="card-text">Categoría: {{ $producto->Categoria }}</p> --}}
                            <br>
                            <br>
                            <div class="form-group">
                                <select class="currency" name="currency" class="form-control">
                                <option value="MXN">Pesos Mexicanos</option>
                                <option value="USD">Dólares Americanos</option>
                                <option value="EUR">Euros</option>
                                <!-- Agrega aquí las demás monedas que quieras soportar -->
                                </select>
                            </div>
                            <br>
                            <h5>Vendedores</h5>
                            <ul>
                            @foreach($producto->vendedores as $vendedor)
                                <li>{{$vendedor->nombre_marca}}</li>
                            @endforeach
                            </ul>
                            <div class="text-center my-4">
                                <button type="submit" class="btn btn-dark">Ver Producto</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Agrega tu script JavaScript aquí -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    document.querySelectorAll('.currency').forEach(function(select) {
    select.addEventListener('change', function() {
        var currency = this.value;
        var productId = this.closest('form').querySelector('input[name="producto_id"]').value;
        var productPriceElement = document.getElementById('productPrice_' + productId);
        var productPriceInMXN = parseFloat(productPriceElement.textContent.replace('Precio: ', ''));
        let a = this.closest('form').querySelector('p[id="productPrice_' + productId + '"]').getAttribute('old-currency');
        let tipoMonedaElement = this.closest('form').querySelector('#tipoMoneda');
        // Haz una solicitud AJAX para obtener el tipo de cambio
        fetch('/get-exchange-rate/' + a + '/' + currency)
            .then(response => response.json())
            .then(data => {
                var exchangeRate = data.exchangeRate;
                var productPriceInSelectedCurrency = productPriceInMXN * exchangeRate;
                // Actualiza el precio del producto en la página
                productPriceElement.textContent = 'Precio: ' + productPriceInSelectedCurrency.toFixed(2);

                // Actualiza el atributo data-currency
                this.closest('form').querySelector('p[id="productPrice_' + productId + '"]').setAttribute('old-currency', currency);
                // Actualiza el contenido del elemento tipoMoneda
                tipoMonedaElement.textContent = ' ' + currency;
            });
            });
        });

       
        document.getElementById('searchInput').addEventListener('input', function() {
        var inputValue = this.value.toLowerCase();
        console.log('Valor de búsqueda:', inputValue);

        // Obtén todas las tarjetas de producto
        var tarjetas = document.getElementsByClassName('col');

        // Itera sobre cada tarjeta
        for (var i = 0; i < tarjetas.length; i++) {
            var tarjeta = tarjetas[i];
            var titulo = tarjeta.getElementsByClassName('card-title')[0].innerText.toLowerCase();

            // Si el título de la tarjeta coincide con la búsqueda, muestra la tarjeta, de lo contrario, ocúltala
            if (titulo.includes(inputValue)) {
                tarjeta.style.display = '';
            } else {
                tarjeta.style.display = 'none';
            }
        }
});



</script>
</body>
</x-layouts.mainLayout>