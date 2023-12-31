<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <x-navbar/>
    <br>
    <div>
        <form action="{{route('updateUser', $usuarios->id)}}" method="POST" >
            @csrf
            @method('PATCH')
            <input type="text" name="nombre" id="nombre" placeholder="nombre" value="{{$usuarios->name}}">
            <br>
            @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="apellido" id="apellido" placeholder="apellido" value="{{$usuarios->lastname}}">
            <br>
            @error('apellido')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="correo" id="correo" placeholder="correo" value="{{$usuarios->email}}">
            <br>
            @error('correo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <!--
            <input type="password" name="contraseña" id="contraseña" placeholder="contraseña">
            <br>
            @error('contraseña')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            -->
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>