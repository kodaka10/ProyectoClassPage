<x-app-layout>

    <br>
    <div>
        <form action="/registrar-usuario" method="POST" >
            @csrf
            <input type="text" name="nombre" id="nombre" placeholder="nombre">
            <br>
            @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="apellido" id="apellido" placeholder="apellido">
            <br>
            @error('apellido')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="correo" id="correo" placeholder="correo">
            <br>
            @error('correo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="password" name="contraseña" id="contraseña" placeholder="contraseña">
            <br>
            @error('contraseña')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit">Registrar</button>
        </form>
    </div>
</x-app-layout>
