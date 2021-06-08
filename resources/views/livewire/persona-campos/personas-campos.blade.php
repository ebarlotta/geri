<div>
    <x-titulo>Gestión de Campos de Personas</x-titulo>
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
            <x-crear>Nuevo Campo</x-crear>
            @if ($isModalOpen)
            @include('livewire.persona-campos.createpersonascampos')
            @endif
            <table class="w-full ">
                <!--  table-fixed  -->
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Nombre del Campo</th>
                        <th class="px-4 py-2">Tipo de Campo</th>
                        <th class="px-4 py-2">Orden</th>
                        <th class="px-4 py-2">Tipo de Persona</th>
                        <th class="px-4 py-2">LabelCampo</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($PersonasCampos as $PersonaCampo)
                    <tr>
                        <td class="border px-4 py-2">{{ $PersonaCampo->NombreCampo }}</td>
                        <td class="border px-4 py-2">{{ $PersonaCampo->TipoCampo }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center">
                                {{ $PersonaCampo->OrdenCampo }}
                            </div>
                        </td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center">
                                {{ $PersonaCampo->TipoPersona_id }}
                            </div>
                        </td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center">{{ $PersonaCampo->LabelCampo}}</div>
                        </td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center">
                                <!-- Editar  -->
                                <x-editar id="{{$PersonaCampo->id}}"></x-editar>
                                <!-- Eliminar -->
                                <x-eliminar id="{{$PersonaCampo->id}}"></x-eliminar>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>