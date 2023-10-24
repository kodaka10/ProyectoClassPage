<div>
    <br>
    <div class="container mx-auto my-4 px-4">
        <div>
            <input name="buscar" type="text" wire:model.live="buscar" id="simple-search" placeholder="Buscar Clase"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <x-button class="mt-4" wire:click="$set('open', true)">Crear Clase</x-button>
        </div>
        @if($clases->count())
        @foreach($clases as $clase)
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
                @if($clase->user->id !== Auth::user()->id)
                <a class="cursor-pointer bg-blue-500 hover-bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-block" wire:click="JoinId({{$clase->id}})">Unirse</a>
                @endif
            </div>
        @endforeach
        @if($clases->hasPages())
        <div class="px-6 py-3 ">
            {{$clases->links()}} 
         </div>
         @endif
        @else
            <h3 class="mt-4">no se encontraron coincidencias</h3>
        @endif
    </div>

    <x-dialog-modal wire:model="open">
        
        <x-slot name="title">
            Crear Clase
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Titulo"/>
                <x-input type="text" class="w-full" wire:model="Titulo"/>
                @error('Titulo')
                    <span class="text-red-500">
                        {{$message}}
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <x-label value="Materia"/>
                <x-input type="text" class="w-full" wire:model="Materia"/>
                @error('Materia')
                <span class="text-red-500">
                    {{$message}}
                </span>
                @enderror
            </div>

            <div class="mb-4">
                <x-label value="Seccion"/>
                <x-input type="text" class="w-full" wire:model="Seccion"/>
                @error('Seccion')
                <span class="text-red-500">
                    {{$message}}
                </span>
                @enderror
            </div>

            <div class="mb-4">
                <x-label value="Color"/>
                <select name="Color" id="Color" wire:model="Color">
                    <option value="red" selected>Rojo</option>
                    <option value="blue">Azul</option>
                    <option value="gray">Gris</option>
                    <option value="green">Verde</option>
                    <option value="yellow">Naranja</option>
                    <option value="indigo">Azul Oscuro</option>
                    <option value="purple">Morado</option>
                    <option value="pink">Rosa</option>
                </select>
                @error('Color')
                <span class="text-red-500">
                    {{$message}}
                </span>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-4 " wire:click="crearClase" wire:loanding.attr="disabled" wire:target="crearClase" >
                Crear
            </x-secondary-button>
            
            <x-danger-button wire:click="$set('open', false)">
                Cancelar
            </x-danger-button>

        </x-slot>

    </x-dialog-modal>   

    <x-dialog-modal wire:model="openJ">
        
        <x-slot name="title">
            Unirse a la clase
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Ingrese el codigo de la clase: {{$IdClase}}"/>
                <x-input type="text" class="w-full" wire:model="Join"/>
                @error('Join')
                    <span class="text-red-500">
                        {{$message}}
                    </span>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-4 " wire:click="JoinClase" wire:loanding.attr="disabled" wire:target="JoinClase" >
                Unirse
            </x-secondary-button>
            
            <x-danger-button wire:click="$set('openJ', false)">
                Cancelar
            </x-danger-button>

        </x-slot>

    </x-dialog-modal>  


</div>
