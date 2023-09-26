<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    <x-navbar/>
    <h3>Consulta Usuarios</h3>

    <ul>
         @foreach ($usuarios as $usuario)    
         <li><a href="{{route('usuariosC', $usuario->id)}}">{{$usuario->name}}</a></li>
         @endforeach
         <br>
    </ul>
</body>
</html>