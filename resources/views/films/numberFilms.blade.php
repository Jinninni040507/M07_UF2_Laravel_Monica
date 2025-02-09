<x-layout>
    <h1>{{$title}}</h1>

    @if(is_null($films))
        <FONT COLOR="red">No hay ninguna película</FONT>
    @else 
        {{$films}}
    @endif
</x-layout>

