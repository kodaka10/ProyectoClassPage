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
         
         <li>{{$usuario->name}}</li>
         <li>{{$usuario->lastname}}</li>
         <li>{{$usuario->email}}</li>
         <li>{{$usuario->id}}</li>
         <h4>--------------------------------------------</h4>
         @endforeach
         <br>
    </ul>
</body>
</html>