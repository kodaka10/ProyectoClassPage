<x-app-layout>

<h4>Informacion usuario</h4>

@foreach($usuarios->clases as $clase)
<p>Nombre: {{$usuarios->name}}</p>
<h2>Clases: {{$clase->titulo}}</h2>
<h2>Clases: {{$clase->materia}}</h2>
<h2>Clases: {{$clase->seccion}}</h2>
<br>

@endforeach

</x-app-layout>