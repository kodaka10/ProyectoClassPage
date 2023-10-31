<x-app-layout>
    <br>
    <div class="container mx-auto my-4 px-4">
        @if($misClases->count())
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3"  style="grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));">
            @foreach($misClases as $clase)
                <div class="bg-white shadow-md rounded-lg p-4 mt-4">
                    <div class="bg-{{$clase->color}}-500 w-full h-32 mb-4 rounded-lg"></div>
                    <div class="flex items-center mb-2">
                        <img src="/Images/Perfil/Default.webp" alt="Imagen del Profesor" class="h-8 w-8 rounded-full">
                        <div class="ml-2">
                            <h2 class="text-xl font-semibold text-gray-800">
                                <a href="{{ route('clase-detail', ['id' => $clase->id, 'titulo' => str_replace(' ', '_', $clase->titulo)]) }}" class="hover:text-blue-500 hover:underline">
                                    {{ $clase->titulo }}
                                </a>
                            </h2>
                            <p class="text-gray-600 text-sm">Profesor: {{$clase->user->name}} {{$clase->user->lastname}}</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm">Materia: {{$clase->materia}}</p>
                    <p class="text-gray-600 text-sm mb-2">Sección: {{$clase->seccion}}</p>
                </div>
            @endforeach
        </div>
        @if($misClases->hasPages())
        <div class="px-6 py-3 ">
            {{$misClases->links()}} 
         </div>
         @endif
        @else
            <h3 class="mt-4 dark:text-white ">No se encontraron clases.</h3>
        @endif
    </div>
    <br>
</x-app-layout>
