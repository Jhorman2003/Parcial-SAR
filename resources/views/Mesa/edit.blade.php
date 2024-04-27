
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Mesa</title>
</head>
<body>
<div class="container">
    <h1>Editar Mesa</h1>
    <form method="POST" action="{{ route('mesas.update', $mesa->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="inputNumero" class="form-label">Número de Mesa</label>
            <input type="text" class="form-control" id="inputNumero" name="Numero" value="{{ $mesa->Numero }}">
        </div>

        <div class="mb-3">
            <label for="inputCapacidad" class="form-label">Capacidad</label>
            <input type="number" class="form-control" id="inputCapacidad" name="Capacidad" value="{{ $mesa->Capacidad }}">
        </div>

        <div class="mb-3">
            <label for="inputUbicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="inputUbicacion" name="Ubicacion" value="{{ $mesa->Ubicacion }}">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('mesas.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


