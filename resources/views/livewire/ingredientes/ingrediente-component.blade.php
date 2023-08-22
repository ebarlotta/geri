<div>
    <x-titulo>Ingredientes</x-titulo>
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
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
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

                    <div class="flex justify-around">
                        <x-crear>Nuevo Ingrediente</x-crear>
                        <a href="menu">
                            <button class="bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded my-3">
                                Volver al nmenú
                            </button>
                        </a>
                        @if ($isModalOpen)
                            @include('livewire.ingredientes.createingrediente')
                        @endif
                        <div class="w-1/2 justify-end">{{ $datos->links() }}</div>
                    </div>
                    <div style="display: block">
                        {{-- @foreach ($datos as $ingrediente) --}}

                        <table class="table table-sm table-bordered">
                            {{-- <tr class="border-b dark:border-neutral-500">
                                <td colspan="2" align="left" class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">Ingredientes del menú</td>
                            </tr> --}}
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <th class="col-9 border-r px-6 dark:border-neutral-500">Ingredientes</th>
                                <th class="col-2 border-r px-6 dark:border-neutral-500">Cantidad</th>
                                <th class="col-1 border-r px-6 dark:border-neutral-500">Unidad</th>
                                <th class="col-1 border-r px-6 dark:border-neutral-500">Opciones</th>
                            </thead>
                            <tbody>
                                @foreach ($datos as $ingrediente)
                                    <tr>
                                        <td>{{$ingrediente->nombreingrediente}}</td>
                                        <td>{{$ingrediente->categorias['nombrecategoria']}}</td> <!-- Imprime la unidad -->
                                        <td>{{$ingrediente->unidades['name']}}</td>
                                        <td style="width: 20%;">
                                            <div style="display: flex">
                                                <!-- Editar  -->
                                                <x-editar id="{{ $ingrediente->id }}"></x-editar>
                                                <!-- Eliminar -->
                                                <x-eliminar id="{{ $ingrediente->id }}"></x-eliminar>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>

                            {{-- <div class="p-2 shadow-lg" style="background:linear-gradient(90deg, lightblue 20%, white 50%); width:93%; height:100px; display: flex; margin: 1.25rem; border-radius: 10px; height: 100%;">
                                <div style="width:90%;">
                                    <div style="width:100%; display: flex">
                                        <p class="shadow-md m-1" style="font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;">{{ $ingrediente->nombreingrediente }}</p>
                                        
                                    </div>
                                </div>
                                <div style="width:90%;">
                                    <div style="width:100%; display: flex">
                                        <p class="shadow-md m-1" style="font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;">{{ $ingrediente->unidades }}</p>
                                        
                                    </div>
                                </div>
                                <div style="width:90%;">
                                    <div style="width:100%; display: flex">
                                        <p class="shadow-md m-1" style="font-size: 18px; background-color: rgb(226, 230, 230); border-radius: 10px; padding: 3px;">{{ $ingrediente->categorias }}</p>
                                        
                                    </div>
                                </div>
                                <div style="width:10%;">
                                    <div class="block justify-center" style="width: 20%; margin: auto; justify-content: space-around;align-items: center;">
                                        <!-- Editar  -->
                                        <x-editar id="{{ $ingrediente->id }}"></x-editar>
                                        <!-- Eliminar -->
                                        <x-eliminar id="{{ $ingrediente->id }}"></x-eliminar>
                                    </div>
                                </div>
                            </div> --}}
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
