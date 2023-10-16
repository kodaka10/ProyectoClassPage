<div>
    <br>
    <div class="container mx-auto">
        <div class="flex items-center">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <input name="buscar" type="text" wire:model.live="buscar" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buscar usuario">
                    <br>
                    @livewire('create-user')
            </div>
        </div>
        <br>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                @if($usuarios->count())
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('id')">
                                ID
                                @if($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="bi bi-sort-alpha-up-alt "></i>
                                    @else
                                        <i class="bi bi-sort-alpha-down-alt "></i>
                                    @endif
                                @else
                                    <i class="bi bi-arrow-down-up "></i>
                                @endif
                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('name')">
                                Nombre
                                @if($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="bi bi-sort-alpha-up-alt float-right"></i>
                                    @else
                                        <i class="bi bi-sort-alpha-down-alt float-right"></i>
                                    @endif
                                @else
                                    <i class="bi bi-arrow-down-up float-right"></i>
                                @endif
                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('lastname')">
                                Apellido
                                @if($sort == 'lastname')
                                    @if ($direction == 'asc')
                                        <i class="bi bi-sort-alpha-up-alt float-right"></i>
                                    @else
                                        <i class="bi bi-sort-alpha-down-alt float-right"></i>
                                    @endif
                                @else
                                    <i class="bi bi-arrow-down-up float-right"></i>
                                @endif
                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-3" wire:click="order('email')">
                                Correo
                                @if($sort == 'email')
                                    @if ($direction == 'asc')
                                        <i class="bi bi-sort-alpha-up-alt float-right"></i>
                                    @else
                                        <i class="bi bi-sort-alpha-down-alt float-right"></i>
                                    @endif
                                @else
                                    <i class="bi bi-arrow-down-up float-right"></i>
                                @endif
                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" wire:key="usuario-{{$usuario->id}}">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $usuario->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $usuario->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $usuario->lastname }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $usuario->email }}
                                </td>
                                <td class="px-6 py-4">
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer" wire:click="edit({{$usuario->id}})">Editar</a>
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer" wire:click="destroy({{$usuario->id}})">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>   
                @else
                   <h3 class="px-6 py-3">No se encontraron registros</h3> 
                @endif

            </table>
        </div>
    </div>
    <br>

    <x-dialog-modal wire:model="openE">

        <x-slot name="title">
            Editar el usuario:
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nombre"/>
                <x-input type="text" class="w-full" wire:model.live="usuarioEdit.name"/>
                @error('usuarioEdit.name')
                    <span class="text-red-500">
                        {{$message}}
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <x-label value="Apellido"/>
                <x-input type="text" class="w-full" wire:model.live="usuarioEdit.lastname"/>
                @error('usuarioEdit.lastname')
                <span class="text-red-500">
                    {{$message}}
                </span>
                @enderror
            </div>

            <div class="mb-4">
                <x-label value="Correo"/>
                <x-input type="text" class="w-full" wire:model="usuarioEdit.email" disabled/>
                @error('email')
                <span class="text-red-500">
                    {{$message}}
                </span>
                @enderror
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-4 " wire:click="saveE">
                Editar
            </x-secondary-button>
            
            <x-danger-button wire:click="$set('openE', false)">
                Cancelar
            </x-danger-button>

        </x-slot>


    </x-dialog-modal>

</div>
