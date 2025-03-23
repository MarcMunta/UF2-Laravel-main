@include('master.header')
<link rel="stylesheet" href="{{ asset('css/actors.css') }}">
<h1>{{$title}}</h1>
@if(empty($actors))
    <FONT COLOR="red">No se ha encontrado ningun actor</FONT>
@else
    <div align="center">
    <table border="1">
        <tr>
           <th>Nombre</th>
           <th>Apellidos</th>
           <th>Cumpleaños</th>
           <th>Ciudad</th>
           <th>Imagen</th>
        </tr>

        @foreach($actors as $actor)
            <tr>
                <td>{{$actor->name}}</td>
                <td>{{$actor->surname}}</td>
                <td>{{$actor->birthdate}}</td>
                <td>{{$actor->country}}</td>
                <td><img src="{{$actor->img_url}}" style="width: 100px; heigth: 120px;" /></td>
            </tr>
        @endforeach
    </table>
</div>
@endif
@include('master.footer')