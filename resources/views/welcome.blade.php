<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    @include('master.header')

    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Películas</h1>
        <nav class="nav justify-content-center mb-4">
            <a class="nav-link" href="/filmout/oldFilms">Pelis Antiguas</a>
            <a class="nav-link" href="/filmout/newFilms">Pelis Nuevas</a>
            <a class="nav-link" href="/filmout/films">Pelis</a>
            <a class="nav-link" href="/filmout/filmsByYear">Pelis por Año</a>
            <a class="nav-link" href="/filmout/filmsByGenre">Pelis por Género</a>
            <a class="nav-link" href="/filmout/sortFilms">Ordenar Descendentemente</a>
            <a class="nav-link" href="/filmout/countFilm">Contar Películas</a>
        </nav>

        <div class="card p-4 shadow-sm">
            <h2 class="text-center">Agregar Nueva Película</h2>
            <form action="{{ route('createFilm') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="year">Año</label>
                    <input type="number" id="year" name="year" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="genre">Género</label>
                    <input type="text" id="genre" name="genre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="country">País</label>
                    <input type="text" id="country" name="country" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="duration">Duración</label>
                    <input type="text" id="duration" name="duration" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="image_url">Imagen URL</label>
                    <input type="text" id="image_url" name="image_url" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>

                @if ($errors->has('errors'))
                    <div class="alert alert-danger mt-2">{{$errors->first('errors')}}</div>
                @endif
            </form>
        </div>
    </div>

    <div class="actors-section">
<h2>Actores</h2>
<ul>
    <li><a href="{{ route('listactors') }}">Listar Actores</a></li>
    <li>
        <form method="GET" action="{{ route('listByDecade', ['year' => '']) }}">
            <label for="decade">Seleccionar década:</label>
            <select name="year" onchange="this.form.action='{{ route('listByDecade', ['year' => '']) }}'.replace('%7Byear%7D', this.value); this.form.submit();">
                <option disabled selected>Elegir década</option>
                <option value="1980-1989">1980</option>
                <option value="1990-1999">1990</option>
                <option value="2000-2009">2000</option>
                <option value="2010-2019">2010</option>
                <option value="2020-2029">2020</option>
            </select>
        </form>
    </li>
    <li><a href="{{ route('contactors') }}">Contar Actores</a></li>
</ul>
</div>

@include('master.footer')

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

<hr>

<hr>