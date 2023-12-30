<div>
    <x-titulo>Medicamentos</x-titulo>
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
                <x-crear>Alta de Medicamentos</x-crear>
                <div class="flex d-flex align-middle" style="margin-top: 23px">
                    <div class="form-check mx-3">
                        <input class="form-check-input"  wire:click="Filtrar('Todos')" type="radio" selected>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Todos
                        </label>
                    </div>
                    <div class="form-check mx-3"> 
                        <input class="form-check-input"  wire:click="Filtrar('Psiquiatricos')" type="radio">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Psiquiátricos
                        </label>
                    </div>
                    <div class="form-check mx-3"> 
                        <input class="form-check-input" wire:click="Filtrar('No psiquiatricos')" type="radio">
                        <label class="form-check-label" for="flexRadioDefault2">
                            No Psiquiátricos
                        </label>
                    </div>
                    <div class="form-check mx-3"> 
                        <input class="form-search" wire:model="buscar" wire:keyup="Buscar()" type="text">
                    </div>
                </div>
            </div>
            @if ($isModalOpen) @include('livewire.medicamentos.createmedicamentos') @endif
            {{-- @if ($isModalOpenAdicionales) @include('livewire.medicamentos.createmedicamentosadicionales') @endif --}}

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Nombre del Medicamento</th>
                        <th class="px-4 py-2">Unidad</th>
                        <th class="px-4 py-2">Cantidad</th>
                        <th class="px-4 py-2">Psiquiátrico</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if($medicamentos)
                    @foreach ($medicamentos as $medicamento)
                    <tr>
                        <td class="border px-4 py-2">{{ $medicamento->nombremedicamento }}</td>
                        <td class="border px-4 py-2">{{ $medicamento->unidad_id }}</td>
                        <td class="border px-4 py-2">{{ $medicamento->cantidad }}</td>
                        <td class="border px-4 py-2">
                            @if($medicamento->psiquiatrico)
                                <span class="border rounded-full border-grey bg-green-400 flex items-center cursor-pointer w-12 justify-start" wire:click="habilitar({{ $medicamento->id }})">
                                    <span class="rounded-full border w-6 h-6 border-grey bg-white shadow">
                                    </span>
                                </span>
                                @else
                                <!------- on ----->
                                <span class="border rounded-full border-grey bg-red-400 flex items-center cursor-pointer w-12 bg-red justify-end" wire:click="habilitar({{ $medicamento->id }})">
                                    <span class="rounded-full border w-6 h-6 border-grey bg-white shadow">
                                    </span>
                                </span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center">
                                <!-- Editar  -->
                                <x-editar id="{{$medicamento->id}}"></x-editar>
                                <!-- Eliminar -->
                                <x-eliminar id="{{$medicamento->id}}"></x-eliminar>
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
