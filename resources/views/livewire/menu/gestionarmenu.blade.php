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
                    @if (session()->has('message'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 py-3 shadow-md my-3"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-xm bg-lightgreen">{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
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
                                    <th class="col-1 border-r px-6 dark:border-neutral-500">Opciones</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A</td>
                                        <td>B</td>
                                        <td>X</td>
                                    </tr>
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
                                            <select class="col-12 btn bg-primary-100" style="background-color: darkgray;" wire:model="ingrediente">
                                                <option value="">sal</option>
                                                <option value="">pimienta</option>
                                                <option value="">comino</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="col-12 btn" style="background-color: darkgray;" wire:model="cantidad">
                                        </td>
                                        <td>
                                            <button wire:click="edit(1)" class="col-6 sm:hidden sm:flex bg-blue-300 hover:bg-blue-400 text-black-900 font-bold py-2 px-4 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                                </svg>
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
