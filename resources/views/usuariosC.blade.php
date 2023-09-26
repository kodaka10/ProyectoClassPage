<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos Usuarios</title>
</head>
<body>
    <!--<x-navbar/> -->
    <x-navbar/>
    <h4>Informacion usuario</h4>
    <p>Nombre: {{$usuarios->name}}</p>
    <p>Correo: {{$usuarios->email}}</p>
</body>
</html>