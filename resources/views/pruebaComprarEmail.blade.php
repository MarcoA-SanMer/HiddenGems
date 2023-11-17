<x-layouts.mainLayout>
<body>
    @foreach($productos as $producto)
    <form action="{{ url('/Comprar/' . $producto->Id_producto) }}" method="post">
        @csrf
        <input type="hidden" name="producto_id" value="{{ $producto->Id_producto }}">
        <h2>{{ $producto->Nombre }}</h2>
        <p id="productPrice_{{ $producto->Id_producto }}">Precio: ${{ $producto->Precio }}</p>
        <p>{{ $producto->Descripción }}</p>
        <p>Categoría: {{ $producto->Categoria }}</p>
        <select class="currency" name="currency">
            <option value="MXN">Pesos Mexicanos</option>
            <option value="USD">Dólares Americanos</option>
            <!-- Agrega aquí las demás monedas que quieras soportar -->
        </select>
        <button type="submit">Comprar</button>
    </form>
    <hr>
@endforeach

<!-- Agrega tu script JavaScript aquí -->
<script>
    document.querySelectorAll('.currency').forEach(function(select) {
        select.addEventListener('change', function() {
            var currency = this.value;
            var productId = this.closest('form').querySelector('input[name="producto_id"]').value;
            var productPriceElement = document.getElementById('productPrice_' + productId);
            var productPriceInMXN = parseFloat(productPriceElement.textContent.replace('Precio: $', ''));

            // Haz una solicitud AJAX para obtener el tipo de cambio
            fetch('/get-exchange-rate/MXN/' + currency)
                .then(response => response.json())
                .then(data => {
                    var exchangeRate = data.exchangeRate;
                    var productPriceInSelectedCurrency = productPriceInMXN * exchangeRate;
                    // Actualiza el precio del producto en la página
                    productPriceElement.textContent = 'Precio: ' + productPriceInSelectedCurrency.toFixed(2) + ' ' + currency;
                });
        });
    });
</script>
</body>
</x-layouts.mainLayout>