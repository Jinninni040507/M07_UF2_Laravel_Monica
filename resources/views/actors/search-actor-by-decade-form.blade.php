    
<x-layout>
   <div class="container p-5">

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
        <h1>Buscar actores por década</h1>
    <form class="d-flex flex-column col-2 mt-4" action="/actorout/listActorsByDecade" method="get">
        
        @csrf
        <label class="d-flex flex-column mb-4 form-label">
            <select name="year" required>
                <option value="1980">1980</option>
                <option value="1990">1990</option>
                <option value="2000">2000</option>
                <option value="2010">2010</option>
            </select>
        </label>
        <button class="btn btn-primary" type="submit">Buscar Actores</button>
    </form>

    </div>
</div>
</x-layout>
