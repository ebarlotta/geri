<div>
    <x-titulo>Gestión de Habitaciones</x-titulo>
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
            <x-crear>Nueva Habitación</x-crear>
            @if ($isModalOpen)
                @include('livewire.habitacion.createhabitacion')
            @endif
            <div style="width: 100%">
            <table class="table-fixed w-full sm:max-width: 450px">  <!--  table-fixed  class="w-full     style="display: block; overflow-x: auto; sm:max-width: 450px""-->
                <thead>
                    <tr class="bg-gray-100">
                        <th class=" py-2">Habitación</th>
                        <th class=" py-2">Descripcion</th>
                        <th class=" py-2">Activa</th>
                        <th class=" py-2">Sexo</th>
                        <th class=" py-2 d-none d-lg-block">Fecha Movimiento</th>
                        <th class=" py-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if($habitaciones)
                    @foreach ($habitaciones as $habitacion)
                    <tr>
                        <td class="border  py-2 text-center">{{ $habitacion->nrohabitacion }}</td>
                        <td class="border  py-2">{{ $habitacion->descripcion }}</td>
                        <td class="border  py-2">
                            <div class="flex justify-center">
                                @if($habitacion->activa)
                                    <span class="border rounded-full border-grey bg-green-400 flex items-center cursor-pointer w-12 justify-start" wire:click="habilitar({{ $habitacion->id }}, {{ $habitacion->activa }})">
                                        <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white"></span>
                                    </span>
                                    @else
                                    <!------- on ----->
                                    <span class="border rounded-full border-grey bg-red-400 flex items-center cursor-pointer w-12 bg-red justify-end" wire:click="habilitar({{ $habitacion->id }}, {{ $habitacion->activa }})">
                                        <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white"></span>
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="border  py-2">
                            <div class="flex justify-center">
                                @if($habitacion->sexo)
                                    <img class="w-9" src="{{asset('images/avatars/boy.png')}}" alt="" wire:click="cambiar({{ $habitacion->id }} , {{ $habitacion->sexo }})">
                                @else
                                <!------- on ----->
                                    <img class="w-9" src="{{asset('images/avatars/girl.png')}}" alt="" wire:click="cambiar({{ $habitacion->id }}, {{ $habitacion->sexo }})">                                
                                @endif
                            </div>
                        </td>
                        <td class="border py-2 text-center d-none d-lg-block">
                            <div class="flex justify-center">
                                {{ date('Y-m-d', strtotime($habitacion->updated_at)) }}
                            </div>
                        </td>
                        <td class="border px-1 py-2">
                            <div class=" justify-center" style="display: inline-grid;">
                                <!-- Editar  -->
                                <x-editar id="{{$habitacion->id}}" class="w-8/12"></x-editar><br>
                                <!-- Eliminar -->
                                <x-eliminar id="{{$habitacion->id}}" class="w-8/12"></x-eliminar>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                        No hay habitaciones
                    @endif
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>