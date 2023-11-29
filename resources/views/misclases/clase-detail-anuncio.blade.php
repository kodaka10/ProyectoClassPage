<x-app-layout>
    <div class="container mx-auto p-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4">
                <h2 class="text-2xl font-semibold mb-2 text-gray-800">{{$anuncio->titulo}}</h2>
                <p class="text-gray-600">Publicado por: {{$anuncio->usuario->name}}</p>
                <p class="text-gray-600">Fecha de Publicación: {{\Carbon\Carbon::parse($anuncio->fecha_publicacion)->format('d-m-y') }}</p>
            </div>

            <div class="mb-4">
                <p class="text-gray-600">Información:</p>
                <p class="text-gray-800">{{$anuncio->informacion}}</p>
            </div>

            <div class="mb-4">
                <p class="text-gray-600">Fecha de Vencimiento:</p>
                <p class="text-gray-800"> {{\Carbon\Carbon::parse($anuncio->fecha_vencimiento)->format('d-m-y') }}</p>
            </div>

            <div class="mb-4">
                <p class="text-gray-600">Archivo Adjunto:</p>
                <a href="{{ route('descargar-archivo', $anuncio->id)}}" target="_blank" class="text-blue-500 hover:underline">{{$anuncio->nombre_original}}</a>
            </div>

        </div>
    </div>
</x-app-layout>
