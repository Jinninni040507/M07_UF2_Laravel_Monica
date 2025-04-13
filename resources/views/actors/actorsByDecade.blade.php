<x-layout>
    <div class="container p-5">
        <h1>{{$title}}</h1>

        @if(empty($actors))
            <FONT COLOR="red">No se ha encontrado ningun Actor</FONT>
        @else
            <div align="center">
            <table class="table table-striped-columns" border="1">
                <tr>
                    @foreach($actors as $actor)
                        @foreach(array_keys($actor) as $key)
                            <th>{{$key}}</th>
                        @endforeach
                        @break
                    @endforeach
                </tr>

                @foreach($actors as $actor)
                    <tr>
                        <td>{{$actor['name']}}</td>
                        <td>{{$actor['surname']}}</td>
                        <td>{{$actor['birthdate']}}</td>
                        <td>{{$actor['country']}}</td>
                        <td><img src={{$actor['img_url']}} style="width: 100px; heigth: 120px;" /></td>
                    </tr>
                @endforeach
            </table>
        </div>
        @endif
    </div>
</x-layout>