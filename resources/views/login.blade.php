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
    @if($errors->has('error'))
    <div class="alert alert-danger">
        {{ $errors->first('error') }}
    </div>
    @endif
    <div>
        <form action="/validar-usuario" method="POST" >
            @csrf
            <input type="text" name="correo" id="correo">
            @error('correo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="password" name="contraseña" id="contraseña">
            @error('contraseña')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>