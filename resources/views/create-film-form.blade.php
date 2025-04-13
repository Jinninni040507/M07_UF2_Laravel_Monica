    
<x-layout>
   

    @if (!empty(session("error")))
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                {{session("error")}}
            </div>
        </div>
    @endif
    @if (!empty($error))
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                {{$error}}
            </div>
        </div>
    @endif
    <div class="d-flex flex-column  align-items-center">
        <h1>Añadir nueva Película</h1>
    <form class="d-flex flex-column col-3" action="/filmin/createFilm" method="post">
        
        @csrf
        <label class="d-flex flex-column mb-4 form-label">
            <div class="mb-2">Nombre:</div>
            <input name="name" type="text" required>
        </label>
        <label class="d-flex flex-column mb-4 form-label">
            <div class="mb-2">Año:</div>
            <input name="year" type="number" required>
        </label>
        <label class="d-flex flex-column mb-4 form-label">
            <div class="mb-2">Genero:</div>
            <input name="genre" type="text" required>
        </label>
        <label class="d-flex flex-column mb-4 form-label">
            País:
            <input name="country" type="text" required>
        </label>
        <label class="d-flex flex-column mb-4 form-label">
            <div class="mb-2">Duración:</div>
            <div class="d-flex">
                <input name="duration" class=" mr-3" type="number" required>
            </div>
        </label>
        <label class="d-flex flex-column mb-4 form-label">
            <div class="mb-2">Url:</div>
            <input name="url" type="text" required>
        </label>

        <button class="btn btn-primary" type="submit">Guardar película</button>
    </form>

</div>
</x-layout>
