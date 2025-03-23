@include('master.header')
<link rel="stylesheet" href="{{ asset('css/actors.css') }}">
<h1>{{$title}}</h1>
@if(empty($actors))
    <FONT COLOR="red">No se ha podido contar ninguna película</FONT>
@else
    <div>
        <p>Contador de cuantos actores hay: {{$actors}}</p>
    </div>
@endif
@include('master.footer')