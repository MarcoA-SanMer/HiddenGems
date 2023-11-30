<x-layouts.mainLayout>
    <div class="container">
        <h1 class="my-3">Mis colaboraciones</h1>
        <ul class="list-group">
            @foreach($productos as $producto)
                <li class="list-group-item">
                    <b>{{$producto->Nombre}} </b> <br>En colaboracion con:
                    <ul>
                    @foreach($producto->vendedores as $vendedor) 
                            <li>{{$vendedor->nombre_marca}} @if($vendedorp->id == $vendedor->id) (tú) @endif</li>
                    @endforeach
                    </ul>

                </li>
            @endforeach
        </ul>
    </div>

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
</x-layouts.mainLayout>