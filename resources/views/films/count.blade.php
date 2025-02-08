<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Películas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    @include('master.header')

    <div class="container mt-5">
        <h1 class="text-center text-primary">{{$title}}</h1>

        @if(empty($films))
            <div class="alert alert-danger text-center mt-4" role="alert">
                No se ha encontrado ninguna película.
            </div>
        @else
            <div class="card shadow-sm p-4 text-center mt-4">
                <h2 class="text-success">Contador de Películas: {{$contador}}</h2>
            </div>
        @endif
    </div>

    @include('master.footer')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
