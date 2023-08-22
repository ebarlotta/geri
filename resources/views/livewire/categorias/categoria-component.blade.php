<div>
    <x-titulo>Categorias</x-titulo>
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
                        <x-crear>Nueva Categoria</x-crear>
                        @if ($isModalOpen)
                            @include('livewire.categorias.createcategoria')
                        @endif
                        <div class="w-1/2 justify-end">{{ $datos->links() }}</div>
                    </div>
                    <div style="display: block">

                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">Descripción</th>
                                    <th class="px-4 py-2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datos as $categoria)
                                <tr>
                                    <td class="border px-4 py-2">{{ $categoria->nombrecategoria }}</td>
                                    <td class="border px-4 py-2">
                                        <div class="block justify-center" style="width: 20%; margin: auto; justify-content: space-around;align-items: center;">
                                            <!-- Editar  -->
                                            <x-editar id="{{ $categoria->id }}"></x-editar>
                                            <!-- Eliminar -->
                                            <x-eliminar id="{{ $categoria->id }}"></x-eliminar>
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
    </div>
</div>
