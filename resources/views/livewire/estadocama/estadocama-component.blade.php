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
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-2 py-4">
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
            <div>
            <table class="w-full" style="display: block; overflow-x: auto;">  <!--  table-fixed  class="w-full "-->
                <thead>
                    <tr class="bg-gray-100">
                        <th class=" py-2">Habitación</th>
                        <th class=" py-2">Cama</th>
                        <th class=" py-2">Estado</th>
                        <th class=" py-2">Sexo Asig.</th>
                        <th class=" py-2 hidden sm:block">Fecha Movimiento</th>
                        <th class=" py-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($camas as $cama)
                    <tr>
                        <td class="border  py-2">
                            <div class="flex justify-center">
                                {{ $cama->NroHabitacion }}
                            </div>
                        </td>
                        <td class="border  py-2">
                            <div class="flex justify-center">
                                {{ $cama->NroCama }}
                            </div>
                        </td>
                        <td class="border  py-2">
                            <div class="flex justify-center">
                                @if($cama->EstadoCama)
                                <span class="border rounded-full border-grey bg-green-400 flex items-center cursor-pointer w-12 justify-start" wire:click="habilitar({{ $cama->id }}, {{ $cama->EstadoCama }})">
                                    <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                    </span>
                                </span>
                                @else
                                <!------- on ----->
                                <span class="border rounded-full border-grey bg-red-400 flex items-center cursor-pointer w-12 bg-red justify-end" wire:click="habilitar({{ $cama->id }}, {{ $cama->EstadoCama }})">
                                    <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                    </span>
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="border  py-2">
                            <div class="flex justify-center">
                                @if($cama->SexoCama)
                                    <img class="w-9" src="{{asset('images/avatars/boy.png')}}" alt="" wire:click="cambiar({{ $cama->id }} , {{ $cama->SexoCama }})">
                                @else
                                <!------- on ----->
                                    <img class="w-9" src="{{asset('images/avatars/girl.png')}}" alt="" wire:click="cambiar({{ $cama->id }}, {{ $cama->SexoCama }})">                                
                                @endif
                            </div>
                        </td>
                        <td class="border text-xs text-sm py-2  hidden sm:block">
                            <div class="flex justify-center">
                                {{ date('d-m-Y', strtotime($cama->updated_at)) }}
                            </div>
                        </td>
                        <td class="border px-1 py-2">
                            <div class="flex justify-center">
                                <!-- Editar  -->
                                <x-editar id="{{$cama->id}}" class="w-8/12"></x-editar>
                                <!-- Eliminar -->
                                <x-eliminar id="{{$cama->id}}" class="w-8/12"></x-eliminar>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>