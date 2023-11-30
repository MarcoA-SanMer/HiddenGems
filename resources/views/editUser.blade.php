<x-layouts.mainLayout>
    <div class="container">
        <h1 class="my-3">Mi cuenta</h1>

        @if($user->user_type == "vendedor")
        <h3>Id de vendedor para colaboraciones: "{{$user->vendedor->id}}"</h3>
        <br>
        @endif

        <form method="post" action="{{ route('User.edit')}}" class="mb-3">
            @csrf
            <div class="form-group">
            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" id="nombre_U" value="{{$user->name}}" class="form-control" required><br>
            </div>

            <div class="form-group">
            <label for="contra">Nueva Contraseña</label><br>
            <input type="password" name="contra" id="nombre_U" class="form-control" required><br>
            </div>

            <div class="form-group">
            <label for="contra">Verificar Contraseña</label><br>
            <input type="password" name="contra2" id="nombre_U" class="form-control" required>
            </div>

            <input type="hidden" name="id" value="{{ $user->id }}">
            <br><br>
            <button type="submit" class="btn btn-success btn-sm">Modificar</button>
        </form>
        <br>
        <form action="{{ route('User.destroy', $user->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Borrar Cuenta</button>
        </form>

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