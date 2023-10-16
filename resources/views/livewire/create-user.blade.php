<div>
    <x-button wire:click="$set('open', true)"> 
        Crear usuario
    </x-button>

    <x-dialog-modal wire:model="open">
        
        <x-slot name="title">
            Crear nuevo usuario
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nombre"/>
                <x-input type="text" class="w-full" wire:model="name"/>
                @error('name')
                    <span class="text-red-500">
                        {{$message}}
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <x-label value="Apellido"/>
                <x-input type="text" class="w-full" wire:model="lastname"/>
                @error('lastname')
                <span class="text-red-500">
                    {{$message}}
                </span>
                @enderror
            </div>

            <div class="mb-4">
                <x-label value="Correo"/>
                <x-input type="text" class="w-full" wire:model="email"/>
                @error('email')
                <span class="text-red-500">
                    {{$message}}
                </span>
                @enderror
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-4 " wire:click="save" wire:loanding.attr="disabled" wire:target="save" >
                Crear
            </x-secondary-button>
            
            <x-danger-button wire:click="$set('open', false)">
                Cancelar
            </x-danger-button>

        </x-slot>

    </x-dialog-modal>   
</div>
