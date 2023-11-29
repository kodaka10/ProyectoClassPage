<x-app-layout>
    <br>
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white rounded-md p-8 shadow-md">
            <h2 class="text-2xl font-semibold mb-6">Iniciar Sesión</h2>

            <form action="/validar-usuario" method="POST">
                @csrf

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

                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Entrar</button>
            </form>
        </div>
    </div>
</x-app-layout>
