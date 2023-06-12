<div>
    <x-titulo>Gestión de Menú - {{ $menu[0]['nombremenu'] }}</x-titulo>
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
                    <div>
                        <div style="background-color: rgb(205, 207, 209)">
                            Ingredientes del menú
                            <table class="min-w-full border text-center text-sm font-light dark:border-neutral-500">
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
                                    @foreach ($ingredientesdelmenu as $ingredientedelmenu)
                                        <tr>
                                            <td>{{$ingredientedelmenu->nombreingrediente}}</td>
                                            <td>{{$ingredientedelmenu->cantidad}}</td>
                                            <td>{{$ingredientedelmenu->name}}</td> <!-- Imprime la unidad -->
                                            <td>X</td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div><br>

                        <div style="background-color:  rgb(205, 207, 209)">
                            Seleccione los ingredientes del menú
                            <table class="min-w-full border text-center text-sm font-light dark:border-neutral-500">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <th class="col-9 border-r px-6 dark:border-neutral-500">Ingredientes</th>
                                    <th class="col-2 border-r px-6 dark:border-neutral-500">Cantidad</th>
                                    <th class="col-1 border-r px-6 dark:border-neutral-500">Opciones</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="col-12 btn bg-primary-100" style="background-color: darkgray;" wire:model="ingredienteagestionar">
                                                <option value="0" selected>-</option>
                                                @foreach ($ingredientes as $ingrediente)
                                                    <option value="{{ $ingrediente->id}}">{{$ingrediente->nombreingrediente}}</option>
                                                @endforeach
                                            </select>
                                            @error('ingredienteagestionar') <span class="text-red-500">{{ $message }}</span>@enderror
                                        </td>
                                        <td>
                                            <input type="text" class="col-12 btn" style="background-color: darkgray;" wire:model="cantidad">
                                            @error('cantidad') <span class="text-red-500">{{ $message }}</span>@enderror

                                        </td>
                                        <td>
                                            <button wire:click="AgregarElementoAlMenu()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-300 text-base leading-6 font-bold text-white-900 shadow-sm hover:bg-red-400 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                Guardar
                                            </button>
                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
