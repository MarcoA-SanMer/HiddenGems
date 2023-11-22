<!DOCTYPE html>
<html>
<head>
    <title>Compra realizada</title>
    <!-- Agrega Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h1 class="display-4">¡Compra realizada!</h1>
            <p class="lead">Gracias por tu compra. Serás redirigido en breve...</p>
            <!-- Agrega el GIF -->
            <img src="https://media.tenor.com/lCKwsD2OW1kAAAAC/happy-cat-happy-happy-cat.gif" alt="Happy Cat">
        </div>
    </div>
</div>

<script>
    setTimeout(function(){
        window.location.href = '/allproducts';
    }, 3000);
</script>

</body>
</html>
