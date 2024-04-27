<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Lista de Reservas</title>
  </head>

  <body>
  <body>
  <div class="container">
    <h1>Listado de Reservas</h1>
    <a href="{{ route('reservas.create') }}" class="btn btn-success">Agregar Reserva</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mesa ID</th>
                <th scope="col">Cliente</th>
                <th scope="col">Fecha de Reserva</th>
                <th scope="col">Hora de la Reserva</th>
                <th scope="col">Número de Personas</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
            <tr>
                <th scope="row">{{ $reserva->id }}</td>
                <td>{{ $reserva->mesa_id }}</td>
                <td>{{ $reserva->cliente->Nombre }} {{ $reserva->cliente->Apellido }}</td>
                <td>{{ $reserva->Fecha_Reserva }}</td>
                <td>{{ $reserva->Hora_de_la_reserva }}</td>
                <td>{{ $reserva->Numero_de_personas }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta reserva?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>