<x-layout>
    <div class="container p-5 h-50">
    <h1>{{$title}}</h1>

    @if(is_null($films))
        <FONT COLOR="red">{{ $error }}</FONT>
    @else 
        {{$films}}
    @endif
    </div>
</x-layout>

