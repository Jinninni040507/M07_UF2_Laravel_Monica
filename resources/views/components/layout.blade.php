<div>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ReelBase</title>
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    
    <body>
        <header>
            <nav class="navbar-custom navbar navbar-expand-lg">
                <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <a class="navbar-brand" href="/">ReelBase</a>
                  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                      </li> --}}
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Películas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href=/filmout/films>Todas las pelis</a></li>
                            <li><a class="dropdown-item" href=/filmout/newFilms>Pelis nuevas</a></li>
                            <li><a class="dropdown-item" href=/filmout/oldFilms>Pelis antiguas</a></li>
                            <li><a class="dropdown-item" href=/filmout/sortFilms>Pelis ordenadas por año</a></li>
                            <li><a class="dropdown-item" href=/filmout/countFilms>Contar pelis</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="/filmin/createFilmForm">Añadir Película</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Actores
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href=/actorout/actors>Todos los actores</a></li>
                            <li><a class="dropdown-item" href=/actorout/countActors>Contar actores</a></li>
                            <hr>
                            <li>
                              <a class="dropdown-item" href=/actorout/searchActorsByDecade>Buscar Actores por década</a>
                            </li>
                            <li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
            </nav>
          
        </header>

        <main class="">
            {{ $slot }}
        </main>
        
        <footer class="text-center text-md-start footer-custom">
            <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">ReelBase</h5>
        
                <p>
                    Esto es ReelBase!
                </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">FilmOut</h5>
        
                <ul class="list-unstyled mb-0">
                    <li><a href=/filmout/films>Todas las pelis</a></li>
                    <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
                    <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
                    <li><a href=/filmout/sortFilms>Pelis ordenadas por año</a></li>
                    <li><a href=/filmout/countFilms>Contar pelis</a></li>
                </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">FilmIn</h5>
        
                <ul class="list-unstyled">
                    <li>
                    <a href="/filmin/createFilmForm" class="text-body">Añadir Películas</a>
                    </li>
                </ul>
                </div>
            </div>
            </div>
            <div class="text-center p-3">
            © 2025 Copyright:
            <a class="text-body" href="#">ReelBase.com</a>
            </div>     
        </footer>
    
        <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    </body>
    
    </html>
    