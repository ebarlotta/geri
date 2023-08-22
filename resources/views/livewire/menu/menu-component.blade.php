<div>
    <x-titulo>Menúes</x-titulo>
    <x-slot name="header">
        <div class="flex">
            <!-- //Comienza en submenu de encabezado -->

            <!-- Navigation Links -->
            @livewire('submenu')
        </div>

    </x-slot>

    <div class="content-center flex">
        <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4">
                    @if (session()->has('message'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-xm bg-lightgreen">{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($isModalOpenGestionar)
                        @include('livewire.menu.gestionarmenu')
                    @else
                        <div class="flex justify-around">
                            <x-crear>Nuevo Menú</x-crear>
                            @if ($isModalOpen)
                                @include('livewire.menu.createmenu')
                            @endif
                            <div><a href="{{ route('ingredientes') }}">
                                    <button wire:click="create()"
                                        class="bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded my-3">
                                        Nuevo Ingrediente
                                    </button>
                                </a>
                            </div>
                            <div class="w-1/2 justify-end">{{ $datos->links() }}</div>
                        </div>
                        <div style="display: block">

                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre del Menú</th>
                                        <th scope="col">Activo</th>
                                        <th scope="col">Tiempo de Preparción</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datos as $menu)
                                        <tr>
                                            <td>{{ $menu->nombremenu }}</td>
                                            <td>
                                                <div class="flex justify-center">
                                                    @if($menu->menuactivo)
                                                        <span class="border rounded-full border-grey bg-green-400 flex items-center cursor-pointer w-12 justify-start" wire:click="habilitar({{ $menu->id }}, {{ $menu->menuactivo }})">
                                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                                            </span>
                                                        </span>
                                                        @else
                                                        <!------- on ----->
                                                        <span class="border rounded-full border-grey flex items-center cursor-pointer w-12 bg-red-500 justify-end"  wire:click="habilitar({{ $menu->id }}, {{ $menu->menuactivo }})">
                                                            <span class="rounded-full border w-6 h-6 border-grey shadow-inner bg-white shadow">
                                                            </span>
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $menu->tiempopreparacion }}</td>
                                            <td style="width: 20%;">
                                                <div style="display: flex">
                                                    <!-- Gestionar  -->
                                                    <x-gestionar id="{{ $menu->id }}"></x-gestionar>
                                                    <!-- Editar  -->
                                                    <x-editar id="{{ $menu->id }}"></x-editar>
                                                    <!-- Eliminar -->
                                                    <x-eliminar id="{{ $menu->id }}"></x-eliminar>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
