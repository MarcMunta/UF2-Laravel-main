<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Películas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    @include('master.header')

    <div class="container mt-4">
        <h1 class="text-center text-primary">{{$title}}</h1>

        @if(empty($films))
        <div class="alert alert-danger text-center" role="alert">
            No se ha encontrado ninguna película.
        </div>
        @else
        <div class="table-responsive mt-4">
            <table class="table table-hover table-bordered text-center shadow-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>title</th>
                        <th>year</th>
                        <th>genre</th>
                        <th>country</th>
                        <th>duration</th>
                        <th>img</th>
                        <!-- @foreach($films as $film)
                        @foreach(array_keys($film) as $key)
                        <th>{{$key}}</th>
                        @endforeach
                        @break
                        @endforeach -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($films as $film)
                    <tr>
                        <td>{{ $film['title'] }}</td>
                        <td>{{ $film['year'] }}</td>
                        <td>{{ $film['genre'] }}</td>
                        <td>{{ $film['country'] }}</td>
                        <td>{{ $film['duration'] }}</td>
                        <td>
                            <img src="{{ $film['img_url'] }}" class="img-thumbnail" style="width: 100px; height: 120px;" alt="Imagen de la película">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

    @include('master.footer')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>