<div>
    <x-titulo>Gestión de Camas</x-titulo>
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
            <x-crear>Nueva Cama</x-crear>
            @if ($isModalOpen)
            @include('livewire.estadocama.createcama')
            @endif
            <table class="w-full ">  <!--  table-fixed  -->
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Nro Habitación</th>
                        <th class="px-4 py-2">Nro Cama</th>
                        <th class="px-4 py-2">Estado</th>
                        <th class="px-4 py-2">Sexo Asig.</th>
                        <th class="px-4 py-2">Fecha Movimiento</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($camas as $cama)
                    <tr>
                        <td class="border px-4 py-2">{{ $cama->NroHabitacion }}</td>
                        <td class="border px-4 py-2">{{ $cama->NroCama }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center">
                                @if($cama->EstadoCama)
                                <span class="border rounded-full border-grey bg-green-400 flex items-center cursor-pointer w-12 justify-start" wire:click="habilitar({{ $cama->id }}, {{ $cama->EstadoCama }})">
                                    <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                    </span>
                                </span>
                                @else
                                <!------- on ----->
                                <span class="border rounded-full border-grey flex items-center cursor-pointer w-12 bg-green justify-end" wire:click="habilitar({{ $cama->id }}, {{ $cama->EstadoCama }})">
                                    <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                    </span>
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center">
                                @if($cama->SexoCama)
                                    <img class="w-9" src="{{asset('images/avatars/boy.png')}}" alt="" wire:click="cambiar({{ $cama->id }} , {{ $cama->SexoCama }})">
                                @else
                                <!------- on ----->
                                    <img class="w-9" src="{{asset('images/avatars/girl.png')}}" alt="" wire:click="cambiar({{ $cama->id }}, {{ $cama->SexoCama }})">                                
                                @endif
                            </div>
                        </td>
                        <td class="border px-4 py-2">{{ date('Y-m-d', strtotime($cama->updated_at)) }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center">
                                <!-- Editar  -->
                                <x-editar id="{{$cama->id}}"></x-editar>
                                <!-- Eliminar -->
                                <x-eliminar id="{{$cama->id}}"></x-eliminar>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>