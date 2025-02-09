<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
</head>

<body class="container">

    <h1 class="mt-4">Lista de Peliculas</h1>
    <ul>
        <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
        <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
        <li><a href=/filmout/films>Pelis</a></li>
        <li><a href=/filmout/sortFilms>Pelis ordenadas por año</a></li>
        <li><a href=/filmout/countFilms>Contar pelis</a></li>
    </ul>

    @if (!empty(session("error")) || !empty($error))
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                {{session("error")}}
                {{$error}}
            </div>
        </div>
    @endif

    <form class="d-flex flex-column" action="/filmin/createFilm" method="post">
        @csrf
        <label class="d-flex flex-column mb-4 form-label col-3">
            <div class="mb-2">Nombre:</div>
            <input name="name" type="text" required>
        </label>
        <label class="d-flex flex-column mb-4 form-label col-3">
            <div class="mb-2">Año:</div>
            <input name="year" type="number" required>
        </label>
        <label class="d-flex flex-column mb-4 form-label  col-3">
            <div class="mb-2">Genero:</div>
            <input name="genre" type="text" required>
        </label>
        <label class="d-flex flex-column mb-4 form-label  col-3">
            País:
            <input name="country" type="text" required>
        </label>
        <label class="d-flex flex-column mb-4 form-label  col-3">
            <div class="mb-2">Duración:</div>
            <div class="d-flex">
                <input name="duration" class="col-3 mr-3" type="number" required>
            </div>
        </label>
        <label class="d-flex flex-column mb-4 form-label  col-3">
            <div class="mb-2">Url:</div>
            <input name="url" type="text" required>
        </label>

        <button class="btn btn-primary col-2" type="submit">Guardar peli</button>
    </form>
    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Include any additional HTML or Blade directives here -->

</body>

</html>
