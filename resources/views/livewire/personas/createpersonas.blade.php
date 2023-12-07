<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle col-7 sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <!-- Controles -->

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div style="display:flex; flex-wrap:wrap;">
                        <div class="mb-2 col-8" style="display:flex; flex-wrap:wrap;">
                            <div class="mb-2 col-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Apellido y Nombre</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese Apellido y Nombre" wire:model="name">
                                @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="mb-2 col-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Tipo de documento</label>
                                <select name="tipodocumento_id" id="" wire:model="tipodocumento_id">
                                    <option value="">-</option>
                                    @foreach($tipos_documentos as $tipodocumento)
                                        <option value="{{ $tipodocumento->id }}">{{ $tipodocumento->tipodocumento}}</option>
                                    @endforeach
                                </select>
                                @error('tipodocumento_id') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="mb-2 col-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">DNI</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese documento" wire:model="documento" maxlength="8">
                                @error('documento') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-2 col-4">
                            
                                <label class="block text-gray-700 text-sm font-bold mb-2">Alias</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese Alias" wire:model="alias">
                                @error('alias') <span class="text-red-500">{{ $message }}</span>@enderror
                            
                            </div>
                            <div class="mb-2 col-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Fecha de Nacimiento</label>
                                <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese fecha de nacimiento" wire:model="nacimiento">
                                @error('nacimiento') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-2 col-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Domicilio</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese domicilio" wire:model="domicilio">
                                @error('domicilio') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>

                        </div>
                        <div class="mb-2 col-4" style="display:flex; flex-wrap:wrap; justify-content: center;">
                            <img class="col-8 shadow-md rounded-circle py-2" src="{{ asset('images/sin_imagen.jpg') }}" alt="" style="width: 70%;">
                            <i class="fa fa-edit mt-4 mr-4" style="position: absolut ;position: absolute;top: 70%;right: 70px; width:100px;"></i>
                        </div>
                    </div>                    
                    <div style="display:flex; flex-wrap:wrap;">                                               
                         <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Estado Civil</label>
                            <select name="estadocivil_id" id="" wire:model="estadocivil_id">
                                <option value="">-</option>
                                @foreach($estados_civiles as $estadocivil)
                                    <option value="{{ $estadocivil->id }}">{{ $estadocivil->estadocivil}}</option>
                                @endforeach
                            </select>
                            @error('estadocivil_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>                        
                        <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Sexo</label>
                            <select name="sexo" id="" wire:model="sexo">
                                <option value=""></option>
                                <option value="1">Masculino</option>
                                <option value="0">Femenina</option>
                            </select>
                            @error('sexo') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">E-mail</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese Email" wire:model="email">
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tipo de Persona</label>
                            <select name="tipopersona_id" id="" wire:model="tipopersona_id">
                                <option value="">-</option>
                                @foreach($tipos_de_personas as $tipodepersona)
                                    <option value="{{ $tipodepersona->id }}">{{ $tipodepersona->tipodepersona}}</option>
                                @endforeach
                            </select>
                            @error('tipopersona_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nacionalidad</label>
                            <select name="nacionalidad_id" id="" wire:model="nacionalidad_id">
                                <option value="">-</option>
                                @foreach($nacionalidades as $nacionalidad)
                                    <option value="{{ $nacionalidad['id'] }}">{{ $nacionalidad['nacionalidad_descripcion']}}</option>
                                @endforeach
                            </select>
                            @error('nacionalidad_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Localidad</label>
                            <select name="localidad_id" id="" wire:model="localidad_id">
                                <option value="">-</option>
                                @foreach($localidades as $localidad)
                                    <option value="{{ $localidad->id }}">{{ $localidad->localidad_descripcion}}</option>
                                @endforeach
                            </select>
                            @error('localidad_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tipo de Beneficio</label>
                            <select name="beneficio_id" id="" wire:model="beneficio_id">
                                <option value="">-</option>
                                @foreach($beneficios as $beneficio)
                                    <option value="{{ $beneficio->id }}">{{ $beneficio->descripcionbeneficio}}</option>
                                @endforeach
                            </select>
                            @error('beneficio_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Grado de Dependencia</label>
                            <select name="gradodependencia_id" id="" wire:model="gradodependencia_id">
                                <option value="">-</option>
                                @foreach($grados_dependencias as $gradodependencia)
                                    <option value="{{ $gradodependencia->id }}">{{ $gradodependencia->gradodependenciaDescripcion}}</option>
                                @endforeach
                            </select>
                            @error('gradodependencia_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Escolaridad</label>
                            <select name="escolaridad_id" id="" wire:model="escolaridad_id">
                                <option value="">-</option>
                                @foreach($escolaridades as $escolaridad)
                                    <option value="{{ $escolaridad->id }}">{{ $escolaridad->escolaridadDescripcion}}</option>
                                @endforeach
                            </select>
                            @error('escolaridad_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Cama</label>
                            <select name="cama_id" id="" wire:model="cama_id">
                                    <option value="" selected>-</option>
                                    <option value="1">Sin cama</option>
                                    @foreach($camas as $cama)
                                        <option value="{{ $cama['cama_id'] }}">{{ $cama['cama_id'] }} </option>
                                    @endforeach
                                </select>
                            @error('cama_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Estado de Persona</label>
                            <select name="estado_id" id="" wire:model="estado_id">
                                <option value="">-</option>
                                @foreach($person_activos as $personactivo)
                                    <option value="{{ $personactivo->id }}">{{ $personactivo->estado}}</option>
                                @endforeach
                            </select>
                            @error('estado_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <!-- Botones -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <x-guardar></x-guardar>
                    <x-cerrar></x-cerrar>
                </div>
            </form>
        </div>
    </div>
</div>