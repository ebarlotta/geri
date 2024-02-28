<div>
    <x-titulo>Actores</x-titulo>
    <x-slot name="header">
        <div class="flex">
            <!-- //Comienza en submenu de encabezado -->

            <!-- Navigation Links -->
            @livewire('submenu')
        </div>

    </x-slot>
    <div class="mx-auto sm:px-6 lg:px-8">
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
            <div class="flex d-flex" style="flex-wrap: wrap;">
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
                <div class="flex d-flex align-middle" style="margin-top: 23px">
                    <div class="form-check mx-3"> 
                        <input class="form-input" wire:model="searchActor" wire:keyup="Filtrar()" type="textbox" value="" placeholder="Buscar Nombre/Apellido" style="background-color: darkgray; padding:5px; border-radius:4px;">
                    </div>
                </div>
            </div>
            @if ($isModalOpen) @include('livewire.actores.createactores') @endif
            @if ($isModalOpenAdicionales) @include('livewire.actores.createactoresadicionales') @endif
            @if ($isModalOpenGestionar) @include('livewire.actores.createactores2') @endif
            @if ($modalpreguntas) @include('livewire.actores.modalpreguntas') @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 col-3">Apellido y Nombre</th>
                        <th class="px-4 py-2 col-2">Tipo</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if($actores)
                    @foreach ($actores as $actor)
                    <tr>
                        <td class="border px-4 py-2 col-3" style="width: 10%">{{ $actor->nombre }}</td>
                        <td class="border px-4 py-2 col-2">{{ $actor->TipoDePersona->tipodepersona }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center">
                                <!-- Gestionar -->
                                <div>
                                    {{-- <a href="{{ route('agentegestionar')}} "> --}}
                                    {{-- <button class="hidden sm:flex bg-green-300 hover:bg-green-400 text-black-900 font-bold py-2 px-4 mr-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                        Gestionar
                                    </button> --}}
                                    {{-- </a> --}}
                                    
                                </div>
                                <x-gestionar id="{{$actor->id}}">Gestionar</x-gestionar>
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
