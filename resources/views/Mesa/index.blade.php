</div>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Mesas</title>
  </head>
  <body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mesas') }}
            </h2>
        </x-slot>

        <div class="container">
            <h1>Listado de Mesas</h1>
            <a href="{{ route('mesas.create') }}" class="btn btn-success">Agregar Mesa</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Número</th>
                        <th scope="col">Capacidad</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mesas as $mesa)
                    <tr>
                        <th scope="row">{{ $mesa->id }}</td>
                        <td>{{ $mesa->Numero }}</td>
                        <td>{{ $mesa->Capacidad }}</td>
                        <td>{{ $mesa->Ubicacion }}</td>
                        <td>
                            <div class="btn-group" role="group">
                            <a href="{{ route('mesas.edit', $mesa->id) }}" class="btn btn-primary btn-custom">Editar</a>
        <form action="{{ route('mesas.destroy', $mesa->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta mesa?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-custom">Eliminar</button>
        </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
  </body>
</html>