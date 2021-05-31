<div>
    <x-titulo>Beneficios</x-titulo>
    <div>
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
                <x-crear>Nuevo Beneficio</x-crear>
                @if ($isModalOpen)
                @include('livewire.beneficios.createbeneficios')
                @endif
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <!-- <th class="px-4 py-2 w-20">No.</th> -->
                            <th class="px-4 py-2">Descripción</th>
                            <th class="px-4 py-2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beneficios as $beneficio)
                        <tr>
                            <!-- <td class="border px-4 py-2">{{ $beneficio->id }}</td> -->
                            <td class="border px-4 py-2">{{ $beneficio->descripcionbeneficio }}</td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-center">
                                    <!-- Editar  -->
                                    <x-editar id="{{$beneficio->id}}"></x-editar>
                                    <!-- Eliminar -->
                                    <x-eliminar id="{{$beneficio->id}}"></x-eliminar>
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