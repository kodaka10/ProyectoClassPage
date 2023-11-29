<div>
    @can('anuncio-clase', $clase)
        @if ($mostrarBoton)
        <div class="mt-4 mx-auto w-full md:w-3/4">
            <div class="bg-white shadow-md rounded-lg p-4 mt-4">
                <div class="flex items-center mb-4">
                    <img src="/Images/Perfil/Default.webp" alt="Imagen del Profesor" class="h-8 w-8 rounded-full mr-2">
                    <button wire:click="mostrarFormulario" class="p-2 border rounded-md w-full bg-white focus:outline-none focus:shadow-outline-blue">
                        <span class="text-gray-600 placeholder-opacity-75 inline-block w-full text-left hover:text-blue-500 transition">Anuncia algo a tu clase</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
    @endcan

    @if ($formularioVisible)
    <div class="mt-4 mx-auto w-full md:w-3/4">
        <div class="bg-white shadow-md rounded-lg p-4 mt-4">
                @csrf
                <div class="mb-4">
                    <label for="titulo" class="block text-sm font-medium text-gray-600">Título:</label>
                    <input wire:model="titulo" type="text" name="titulo" id="titulo" class="mt-1 p-2 border rounded-md w-full">
                    @error('titulo')
                        <span class="text-red-500">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="informacion" class="block text-sm font-medium text-gray-600">Información:</label>
                    <textarea wire:model="informacion" name="informacion" id="informacion" class="mt-1 p-2 border rounded-md w-full"></textarea>
                    @error('informacion')
                        <span class="text-red-500">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600">Tipo:</label>
                    <div class="mt-1 space-x-4">
                        <label for="anuncio" class="inline-flex items-center">
                            <input wire:model="tipo" type="radio" name="tipo" id="anuncio" value="anuncio" class="h-4 w-4 text-blue-500 border-gray-300 rounded">
                            <span class="ml-2">Anuncio</span>
                        </label>

                        <label for="tarea" class="inline-flex items-center">
                            <input wire:model="tipo" type="radio" name="tipo" id="tarea" value="tarea" class="h-4 w-4 text-blue-500 border-gray-300 rounded">
                            <span class="ml-2">Tarea</span>
                        </label>
                    </div>
                    @error('tipo')
                        <span class="text-red-500">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="archivo" class="block text-sm font-medium text-gray-600">Archivo(opcional)</label>
                    <input wire:model="archivo" type="file" name="archivo" id="archivo" class="mt-1 p-2 border rounded-md w-full">
                    @error('archivo')
                        <span class="text-red-500">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="fecha_vencimiento" class="block text-sm font-medium text-gray-600">Fecha de vencimiento:</label>
                    <input wire:model="fecha_vencimiento" type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="mt-1 p-2 border rounded-md w-full"  min="{{ now()->format('Y-m-d') }}">
                    @error('fecha_vencimiento')
                        <span class="text-red-500">
                            {{$message}}
                        </span>
                    @enderror
                </div>


                <div class="flex items-center">
                <button wire:click="cancelar" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Cancelar
                    </button>
                    <button wire:click="crearAnuncio({{$clase->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Crear
                    </button>
                </div>
        </div>
    </div>
    @endif
    
    <div class="mt-4 mx-auto w-full md:w-3/4">
    @if ($anunciosClase->count())
        @foreach ($anunciosClase as $anuncio)
        <div class="bg-white shadow-md rounded-lg p-4 mt-4">
            <div class="flex items-center mb-2">
                <div class="w-10 h-10 mr-2 text-center">
                    <i class="bi bi-book "></i>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-gray-800">{{$anuncio->usuario->name}} - Fecha: {{\Carbon\Carbon::parse($anuncio->fecha_publicacion)->format('d-m-y') }}</h2>
                    <p class="text-gray-600 text-sm">
                        <span class="font-bold">Ha publicado un anuncio: <a href="{{ route('clase-detail-anuncio', ['id' => $anuncio->id, 'titulo' => str_replace(' ', '_', $anuncio->titulo)]) }}" class="text-blue-500">{{$anuncio->titulo}}</a></span>
                    </p>
                </div>
            </div>
        </div>  
        @endforeach
    @else
        <h3 class="px-6 py-3 dark:text-gray-400">Aun no hay publicaciones.</h3> 
    @endif
    </div>


    @push('js')
        <script>
            Livewire.on('alertaC', function() {
                Swal.fire(
                'Exito!',
                'Anuncio creado con exito',
                'success'
                )
            });
        </script>
    @endpush

</div>
