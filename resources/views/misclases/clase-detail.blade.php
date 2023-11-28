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
        @can('creadorClase', $clase)
        <button wire:click="openM"class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            <i class="bi bi-trash-fill "></i>
        </button>
        @endcan

    </div>
</div>


    {{-- Botones de tablo / personas --}}
        
    @livewire('clase-anuncio', ['clase' => $clase])

</x-app-layout>
