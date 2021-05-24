
<div>
    <h1>Empresa / Estados Personas</h1>
    <div class="py-12">
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
                <button wire:click="create()" class="bg-green text-blue font-bold py-2 px-4 rounded my-3">Crear Estado de Personas</button>
                @if ($isModalOpen)
                    @include('livewire.personactivo.createpersonactivo')
                @endif
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Descripción</th>
                            <th class="px-4 py-2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estados as $estado)
                        <tr>
                            <td class="border px-4 py-2">{{ $estado->id }}</td>
                            <td class="border px-4 py-2">{{ $estado->estado }}</td>
                            <td>
                                <button wire:click="edit({{ $estado->id }})" class="bg-blue text-blue font-bold py-2 px-4 rounded">
                                    Editar
                                    <button wire:click="delete({{ $estado->id }})" class="bg-red hover:bg-red-700 text-blue font-bold py-2 px-4 rounded">Eliminar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

