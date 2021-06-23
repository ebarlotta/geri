<div>
    <x-titulo>Gestión de Interfaces</x-titulo>
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
            <x-crear>Nueva Interface</x-crear>
            @if ($isModalOpen)
                @include('livewire.interfaces.createinterface')
            @endif
            <table class="w-full ">
                <!--  table-fixed  -->
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Nombre de la Interface</th>
                        <th class="px-4 py-2">Tipo de Persona</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Interfaces as $Interfacex)
                    <tr>
                        <td class="border px-4 py-2" wire:click="mostrar({{ $Interfacex->id }})">{{ $Interfacex->NombreInterface }}</td>
                        <td class="border px-4 py-2">
                        {{ $Interfacex->tipodepersonas }}
                        </td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center">
                                <!-- Editar  -->
                                <x-editar id="{{$Interfacex->id}}"></x-editar>
                                <!-- Eliminar -->
                                <x-eliminar id="{{$Interfacex->id}}"></x-eliminar>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
            @if($campos)
                {!! $showCampos !!}
            @endif
                    
        </div>
    </div>
</div>