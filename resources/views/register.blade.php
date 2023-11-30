<x-app-layout>
    <br>
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white rounded-md p-8 shadow-md">
            <h2 class="text-2xl font-semibold mb-6">Registrar Usuario</h2>

            <form action="/registrar-usuario" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-600">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="mt-1 p-2 border w-full">
                    @error('nombre')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="apellido" class="block text-sm font-medium text-gray-600">Apellido</label>
                    <input type="text" name="apellido" id="apellido" placeholder="Apellido" class="mt-1 p-2 border w-full">
                    @error('apellido')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="correo" class="block text-sm font-medium text-gray-600">Correo</label>
                    <input type="text" name="correo" id="correo" placeholder="Correo" class="mt-1 p-2 border w-full">
                    @error('correo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="contraseña" class="block text-sm font-medium text-gray-600">Contraseña</label>
                    <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" class="mt-1 p-2 border w-full">
                    @error('contraseña')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Registrar</button>

                <div class="mt-4">
                    <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:underline">Ya tienes cuenta? inicia sesion</a>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
