<x-layouts.mainLayout>
    <div class="container">
        <h1 class="my-3">Mi cuenta</h1>

        <h3>Id de usuario para colaboraciones: "{{$user->vendedor->id}}"</h3>
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