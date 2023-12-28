<div>
    <x-titulo>Actores</x-titulo>
    <x-slot name="header">
        <div class="flex">
            <!-- //Comienza en submenu de encabezado -->

            <!-- Navigation Links -->
            @livewire('submenu')
        </div>

    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-xm bg-lightgreen">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <div class="flex d-flex">
                <x-crear>Alta de Actores</x-crear>
                <div class="flex d-flex align-middle" style="margin-top: 23px">
                    <div class="form-check mx-3">
                        <input class="form-check-input" wire:model="radios" wire:click="Filtrar()" type="radio" value="Todos">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Todos
                        </label>
                    </div>
                    <div class="form-check mx-3"> 
                        <input class="form-check-input" wire:model="radios" wire:click="Filtrar()" type="radio" value="Agentes" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Agentes
                        </label>
                    </div>
                    <div class="form-check mx-3"> 
                        <input class="form-check-input" wire:model="radios" wire:click="Filtrar()" type="radio" value="Referentes" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Referentes
                        </label>
                    </div>
                    <div class="form-check mx-3"> 
                        <input class="form-check-input" wire:model="radios" wire:click="Filtrar()" type="radio" value="Personal" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Personal
                        </label>
                    </div>
                    <div class="form-check mx-3"> 
                        <input class="form-check-input" wire:model="radios" wire:click="Filtrar()" type="radio" value="Proveedores" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Proveedores
                        </label>
                    </div>
                    <div class="form-check mx-3"> 
                        <input class="form-check-input" wire:model="radios" wire:click="Filtrar()" type="radio" value="Clientes" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Clientes
                        </label>
                    </div>
                    <div class="form-check mx-3"> 
                        <input class="form-check-input" wire:model="radios" wire:click="Filtrar()" type="radio" value="Vendedores" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Vendedores
                        </label>
                    </div>
                    <div class="form-check mx-3"> 
                        <input class="form-check-input" wire:model="radios" wire:click="Filtrar()" type="radio" value="Empresas" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Empresas
                        </label>
                    </div>
                </div>
            </div>
            @if ($isModalOpen) @include('livewire.actores.createactores') @endif
            @if ($isModalOpenAdicionales) @include('livewire.actores.createactoresadicionales') @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Apellido y Nombre</th>
                        <th class="px-4 py-2">Tipo</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if($actores)
                    @foreach ($actores as $actor)
                    <tr>
                        <td class="border px-4 py-2">{{ $actor->nombre }}</td>
                        <td class="border px-4 py-2">{{ $actor->TipoDePersona->tipodepersona }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center">
                                <!-- Editar  -->
                                <x-editar id="{{$actor->id}}"></x-editar>
                                <!-- Eliminar -->
                                <x-eliminar id="{{$actor->id}}"></x-eliminar>
                                <!-- Agregar -->
                                <x-agregar id="{{$actor->id}}"></x-agregar>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
