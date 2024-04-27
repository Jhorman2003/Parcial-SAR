<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Nueva Reserva</title>
  </head>
  <body>
    <div class="container">
        <h1>Nueva Reserva</h1>
        <form method="POST" action="{{ route('reservas.store') }}">
    @csrf

    <div class="mb-3">
        <label for="inputMesa" class="form-label">Mesa</label>
        <select class="form-select" id="inputMesa" name="mesa_id">
            <option selected>Seleccione una mesa...</option>     
            @foreach($mesas as $mesa)
                <option value="{{ $mesa->id }}">{{ $mesa->Ubicacion }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="inputCliente" class="form-label">Cliente</label>
        <select class="form-select" id="inputCliente" name="cliente_id">
            <option selected>Seleccione un cliente...</option>   
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->Nombre }} {{ $cliente->Apellido }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="inputFechaReserva" class="form-label">Fecha Reserva</label>
        <input type="date" class="form-control" id="inputFechaReserva" name="Fecha_Reserva">
    </div>

    <div class="mb-3">
        <label for="inputHoraReserva" class="form-label">Hora Reserva</label>
        <input type="time" class="form-control" id="inputHoraReserva" name="Hora_de_la_reserva">
    </div>

    <div class="mb-3">
        <label for="inputNumeroPersonas" class="form-label">Número de Personas</label>
        <input type="number" class="form-control" id="inputNumeroPersonas" name="Numero_de_personas">
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-primary">Cancel</a>
    </div>
</form>
        
   </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>