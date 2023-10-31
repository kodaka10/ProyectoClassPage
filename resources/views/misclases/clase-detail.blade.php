<x-app-layout>
    <br>
    {{-- informacion de la clase --}}
    <div class="container mx-auto my-4 px-4">
        <div class="bg-white shadow-md rounded-lg p-4 mt-4">
            <div class="bg-{{$clase->color}}-500 w-full h-32 mb-4 rounded-lg"></div>
            <div class="flex items-center mb-2">
                <img src="/Images/Perfil/Default.webp" alt="Imagen del Profesor" class="h-8 w-8 rounded-full">
                <div class="ml-2">
                    <h2 class="text-xl font-semibold text-gray-800">{{$clase->titulo}}</h2>
                    <p class="text-gray-600 text-sm">Profesor: {{$clase->user->name}} {{$clase->user->lastname}}</p>
                </div>
            </div>
            <p class="text-gray-600 text-sm">Materia: {{$clase->materia}}</p>
            <p class="text-gray-600 text-sm mb-2">Sección: {{$clase->seccion}}</p>
        </div>

        {{-- Botones de tablo / personas --}}
        
        {{-- Crear anuncio o tarea --}}

        {{-- anuncios o tareas de la clase --}}
        
        <div class="mt-4 mx-auto w-full md:w-3/4">
            <div class="bg-white shadow-md rounded-lg p-4 mt-4">
                <div class="flex items-center mb-2">
                    <div class="w-10 h-10 mr-2 text-center">
                        <i class="bi bi-book "></i>
                    </div>
                    <div>
                        <h2 class="text-base font-semibold text-gray-800">juan perez rodrigez mendez - 17 nov</h2>
                        <p class="text-gray-600 text-sm">
                            <span class="font-bold">Ha publicado un anuncio: <a href="#" class="text-blue-500">Material de apoyo para el lenguaje C++</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
            
    </div>
</x-app-layout>
