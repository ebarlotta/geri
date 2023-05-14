<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <!-- NombreInterface -->
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la Interface</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Ingrese Nombre de la Interface" wire:model="NombreInterface">
                            @error('NombreInterface') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <!-- Tipo de Persona -->
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Persona</label>
                            <select wire:model="tipo_de_persona_id">
                                <option value="">-</option>
                                @if($tipos)
                                @foreach($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->tipodepersona}}</option>
                                @endforeach
                                @endif
                            </select>
                            @error('tipo_de_persona_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                @if(!$creando)
                <div class="flex">
                    <div class="block w-full ml-4 mr-2 bg-red-100 ">

                        Campos Diponibles<br>
                        @if($disponibles)
                        @foreach($disponibles as $disponible)
                        <div class="flex-inline bg-blue-300 hover:bg-blue-400 text-blue font-bold py-2 px-4 mt-1 mb-1 rounded" wire:click="DarAltaCampo({{ $disponible->id }})">{{$disponible->NombreCampo}}</div>
                        @endforeach
                        @endif
                    </div>
                    <div class="block w-full ml-2 mr-4 bg-green-100">Campos Utilizados<br>
                        @if($utilizados)
                        @foreach($utilizados as $utilizado)
                        <div class="flex-inline bg-blue-300 hover:bg-blue-400 text-blue font-bold py-2 px-4 mt-1 mb-1 rounded" wire:click="DarBajaCampo({{ $utilizado->id }})">{{$utilizado->NombreCampo}}</div>

                        @endforeach
                        @endif
                    </div>

                </div>
                @endif
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <x-guardar></x-guardar>
                    <x-cerrar></x-cerrar>
                </div>
            </form>
        </div>
    </div>
</div>