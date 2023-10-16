<x-app-layout>
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
            <button type="submit" class="dark:text-white">Entrar</button>
        </form>
    </div>

</x-app-layout>
