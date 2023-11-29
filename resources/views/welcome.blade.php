<x-app-layout>
    <div class="container mx-auto p-8 text-center">
        <h1 class="text-4xl font-bold mb-4">Bienvenido a Tu Plataforma de Clases</h1>
        <p class="text-lg text-gray-700 mb-8">Conectate con tus clases, comparte recursos y aprende juntos.</p>
        @guest    
        <div class="flex justify-center space-x-4">
            <a href="{{ route('register') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Registrarse</a>
            <a href="{{ route('login') }}" class="bg-gray-500 text-white py-2 px-4 rounded">Iniciar Sesión</a>
        </div>
        @endguest
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-md p-4 shadow-md">
                <span class="text-blue-500">
                    <i class="bi bi-person" style="font-size: 2em;"></i>
                </span>
                <p class="text-lg font-semibold">Crea y unete a clases en línea.</p>
                <p class="text-gray-600">Únete a diferentes clases para ampliar tu aprendizaje.</p>
            </div>

            <div class="bg-white rounded-md p-4 shadow-md">
                <span class="text-green-500">
                    <i class="bi bi-file-earmark-text" style="font-size: 2em;"></i>
                </span>
                <p class="text-lg font-semibold">Comparte materiales educativos.</p>
                <p class="text-gray-600">Comparte recursos educativos con tus compañeros de clase.</p>
            </div>

            <div class="bg-white rounded-md p-4 shadow-md">
                <span class="text-red-500">
                    <i class="bi bi-chat-dots" style="font-size: 2em;"></i>
                </span>
                <p class="text-lg font-semibold">Interactua con profesores y compañeros de clase.</p>
                <p class="text-gray-600">Ten una comunicacion con compañeros de todos lados e intercambia ideas .</p>
            </div>
        </div>
    </div>
</x-app-layout>
