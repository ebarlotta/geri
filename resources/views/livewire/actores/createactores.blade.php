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
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese Apellido y Nombre" wire:model="nombre">
                                @error('nombre') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="mb-2 col-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Tipo de documento</label>
                                <select name="tipodocumento_id" id="" wire:model="documentotipo_id">
                                    <option value="">-</option>
                                    @foreach($tipos_documentos as $tipodocumento)
                                        <option value="{{ $tipodocumento->id }}">{{ $tipodocumento->tipodocumento}}</option>
                                    @endforeach
                                </select>
                                @error('documentotipo_id') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="mb-2 col-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Documento Nro</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese documento" wire:model="documentonro" maxlength="8">
                                @error('documentonro') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-2 col-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Fecha de Nacimiento</label>
                                <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese fecha de nacimiento" wire:model="nacimiento">
                                @error('nacimiento') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-2 col-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Direccion</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese domicilio" wire:model="direccion">
                                @error('direccion') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-2 col-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Sexo</label>
                            <select name="sexo" id="" wire:model="sexo_id">
                                <option value=""></option>
                                @foreach($sexos as $sexo)
                                    <option value="{{ $sexo->id }}">{{ $sexo->sexodescripcion}}</option>
                                @endforeach
                            </select>
                            @error('sexo_id') <span class="text-red-500">{{ $message }}</span>@enderror
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
                            <label class="block text-gray-700 text-sm font-bold mb-2">Obra Social</label>
                            <select id="" wire:model="obrasocial_id">
                                <option value=""></option>
                                @foreach($obrassociales as $obrasocial)
                                    <option value="{{ $obrasocial->id }}">{{ $obrasocial->obrasocialdescripcion}}</option>
                                @endforeach
                            </select>
                            @error('obrasocial_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">E-mail</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese Email" wire:model="email">
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
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
                                <label class="block text-gray-700 text-sm font-bold mb-2">Teléfono</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                                @error('telefono') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-2 col-1">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Activo</label>
                                <input type="checkbox" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Actor activo" wire:model="activo">
                                @error('activo') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tipo de Actor</label>
                            <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                <option value="">-</option>
                                @foreach($tipos_de_actores as $tipodeactor)
                                    <option value="{{ $tipodeactor->id }}">{{ $tipodeactor->tipodepersona}}</option>
                                @endforeach
                            </select>
                            @error('tipoactor_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        
                        
                    </div>
                <div class="bg-gray-200">
                    
                    <!-- Residente -->
                    @if($tipoactor_id==1)
                    <div style="display:flex; flex-wrap:wrap;">
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Fecha de Ingreso</label>
                            <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Fecha de Egreso</label>
                            <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Alias</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Peso</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nombre del Referente</label>
                                <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                    <option value="">Pepe</option>
                                    <option value="">Juan</option>
                                    <option value="">María</option>                                
                            </select>
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nro de Cama</label>
                                <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                    <option value="">Pepe</option>
                                    <option value="">Juan</option>
                                    <option value="">María</option>                                
                            </select>
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Cantidad de Pañales</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Grupo Sanguineo</label>
                                <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                    <option value="">Pepe</option>
                                    <option value="">Juan</option>
                                    <option value="">María</option>                                
                            </select>
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Sanatorio</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Farmacia</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Laboratorio</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Instituto Radiológico</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Foto DNI</label>
                            <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Foto Carnet</label>
                            <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Cantidad hijos varones</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Cantidad hijas mujeres</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Vivienda Propia</label>
                                <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                    <option value="">-</option>
                                    <option value="">Si</option>
                                    <option value="">No</option>                                
                            </select>
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Última Ocupación</label>
                                <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                    <option value="">Pepe</option>
                                    <option value="">Juan</option>
                                    <option value="">María</option>                                
                            </select>
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Motivo de Egreso</label>
                                <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                    <option value="">Pepe</option>
                                    <option value="">Juan</option>
                                    <option value="">María</option>                                
                            </select>
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Grado de Dependencia</label>
                                <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                    <option value="">Pepe</option>
                                    <option value="">Juan</option>
                                    <option value="">María</option>                                
                            </select>
                        </div>
                    </div>
                    @endif

                    <!-- Referente -->
                    @if($tipoactor_id==2)
                    <div style="display:flex; flex-wrap:wrap;">       
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nombre del Residente</label>
                                <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                    <option value="">Pepe</option>
                                    <option value="">Juan</option>
                                    <option value="">María</option>                                
                            </select>
                        </div>
                        <div class="mb-2 col-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Vínculo</label>
                                <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                    <option value="">Pepe</option>
                                    <option value="">Juan</option>
                                    <option value="">María</option>                                
                            </select>
                        </div>
                    </div>
                    @endif
                    
                    <!-- Proveedor -->
                    @if($tipoactor_id==3)
                    <div style="display:flex; flex-wrap:wrap;">       
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tipo de Responsable</label>
                                <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                    <option value="">Pepe</option>
                                    <option value="">Juan</option>
                                    <option value="">María</option>                                
                            </select>
                        </div>
                    </div>
                    @endif

                    <!-- Cliente -->
                    @if($tipoactor_id==4)
                    <div style="display:flex; flex-wrap:wrap;">       
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tipo de Responsable</label>
                                <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                    <option value="">Pepe</option>
                                    <option value="">Juan</option>
                                    <option value="">María</option>                                
                            </select>
                        </div>
                    </div>
                    @endif

                    <!-- Vendedor -->
                    @if($tipoactor_id==5)
                    <div style="display:flex; flex-wrap:wrap;">       
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tipo de Modalidad</label>
                                <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                    <option value="">Pepe</option>
                                    <option value="">Juan</option>
                                    <option value="">María</option>                                
                            </select>
                        </div>
                    </div>
                    @endif

                    <!-- Personal -->
                    @if($tipoactor_id==4)
                    <div style="display:flex; flex-wrap:wrap;">       
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Tipo de Responsable</label>
                                <select name="tipopersona_id" id="" wire:model="tipoactor_id">
                                    <option value="">Pepe</option>
                                    <option value="">Juan</option>
                                    <option value="">María</option>                                
                            </select>
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Fecha de Ingreso</label>
                            <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Ingreso Mínimo</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">CBU</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Número de trámite</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Patente</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                        <div class="mb-2 col-3">    
                            <label class="block text-gray-700 text-sm font-bold mb-2">Número de Cuenta</label>
                            <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese teléfono" wire:model="telefono">
                        </div>
                    </div>
                    @endif
                    
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