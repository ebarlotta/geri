<div>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
            <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle col-11 sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form class="col-12">
                <!-- Controles -->
                @if($mostrarinformeespecifico) @include('livewire.actores.informessociales') @endif
                @if($ModalNuevoInforme) @include('livewire.actores.nuevoInforme') @endif
                
                <div class="container">
                    <div class="row">
                        <div class="col-3 mt-5 flex border border-primary shadow-0">
                            <img class="block rounded-md flex-none bg-cover mr-3 p-2" src="{{ asset('images/sin_imagen.jpg') }}" style="width: 100px; height: 100px;">
                            <div class="mt-2">
                                <b>Nombre: {{ $name }}</b><br>
                                <label for="">Alias: {{ $alias }}</label>
                            </div>
                        </div>
                        <div class="w-1 bg-gray-300 card shadow-0 mt-3"></div>
                        <div class="col-8 mt-5 border border-primary shadow-0">
                            <div class="flex d-flex flex-wrap">
                                <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('Sociales')">Informes Sociales</label>
                                <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('Medicos')">Informes Médicos</label>
                                <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('Nutricionales')">Informes Nutricionales</label>           
                                <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('HistoriaDeVida')">historiadevida_id</label>
                                <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('Otro')">Otro</label>
                                <label class="btn btn-info mr-2 rounded-md mt-2" wire:click="CargarInforme('Pagos')">Pagos</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3" >
                            <div class="row">
                                <div class="col-12 card border border-primary shadow-0 mt-3">  
                                    <div class="card-body mt-1">
                                        <table class="col-11 table-striped" >
                                            <tr><td>Domicilio</td><td>{{ $domicilio }}</td></tr>
                                            <tr><td>Documento</td><td>{{ $documento }}</td></tr>
                                            <tr><td>Tipo documento</td><td>{{ $tipodocumento_id }}</td></tr>
                                            <tr><td>Nacimiento</td><td>{{ $nacimiento }}</td></tr>
                                            <tr><td>Sexo</td><td>{{ $sexo_id }}</td> </tr>
                                            <tr><td>EMail</td><td>{{ $email }}</td> </tr>
                                            <tr><td>Nacionalidad</td><td>{{ $nacionalidad_id }}</td> </tr>
                                            <tr><td>Localidad</td><td>{{ $localidad_id }}</td> </tr>
                                            <tr><td>Obra Social</td><td>{{ $beneficio_id }}</td> </tr>
                                            <tr><td>Escolaridad</td><td>{{ $escolaridad_id }}</td> </tr>
                                            <tr><td>Teléfono</td><td>{{ $telefono}}</td> </tr>
                                            <tr><td>Empresa_id</td><td>{{ $nombreempresa }}</td> </tr>
                                            <tr><td>Activo</td><td>@if($activo) SI @else NO @endif </td></tr>
                                            <tr><td>FIngreso</td><td>{{ $fingreso }}</td> </tr>
                                            <tr><td>FEgreso</td><td>{{ $fegreso }}</td> </tr>
                                            <tr><td>Peso</td><td>{{ $peso }}</td> </tr>
                                            <tr><td>Referente</td><td>{{ $actor_referente }}</td> </tr>
                                            <tr><td>Cama Nª</td><td>{{ $cama_id }}</td> </tr>
                                            <tr><td>Motivo Egreso</td><td>{{ $motivosegresos}}</td> </tr>
                                            <tr><td>Grado Depend.</td><td>{{ $gradodependencia }}</td> </tr>
                                        </table>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="w-1 bg-gray-300 card shadow-0 mt-3">
                        </div>
                        <div class="col-8 bg-gray-300 card border border-primary shadow-0 mt-3" style="display: block;">
                            <div>INFORMES DISPONIBLES</div>
                            <div class="col-12" style="display: flex; overflow: auto; background-color: lemonchiffon">
                                @if($listadoinformes)                                   
                                    @foreach($listadoinformes as $informe)
                                        <div class="card sm:col-11 col-md-3 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style="margin: 1%;box-shadow: 10px 5px 5px gray; height: max-content; border: lightgray; border-style: ridge; border-width: thin;" wire:click="MostrarInformes({{ $informe->id }})">
                                            <div class="card-body" style=" max-height: 200px; height: 100%; padding: 0.25rem;">
                                                <p class="card-text flex">
                                                    <input type="button" wire:click="abrirModalNuevoInforme({{ $informe->id }})" class="btn btn-info sm:flex bg-green-300 hover:bg-green-400 text-black-900 font-bold ml-2 rounded" style="max-height: 31px;" value="+">
                                                    <b class="ml-2">{{ $informe->nombreinforme }}</b>
                                                </p>
                                                <p>Area:{{ $informe->areasdescripcion }}</p>
                                                <p>{{ $informe->observaciones }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    No hay informes configurados por el momento
                                @endif 
                            </div>
                            <div class="col-12 " style="display: flex; flex-wrap: wrap; background-color: beige; margin-top:10px">
                                @if($listadoinformesGenerados)
                                    @foreach($listadoinformesGenerados as $informe3)
                                        <div class="card sm:col-11 col-md-3 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style="margin: 1%;box-shadow: 10px 5px 5px gray; height: max-content; border: lightgray; border-style: ridge; border-width: thin;" wire:click="BuscarDatosDelInforme({{ $informe3->id }})">
                                            <div class="card-body" style=" max-height: 200px; height: 100%; padding: 0.25rem;">
                                                <p class="card-text flex">
                                                    <b>{{ $informe3->datosinforme->nombreinforme}}</b><br>  
                                                </p>
                                                <p>Año:{{ $informe3->anio }}</p>
                                                <p>Periodo: {{ $informe3->nroperiodo }}</p>
                                                <p>Profesional: {{ $informe3->datosprofesional->nombre }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    No se ha seleccionado un informe
                                    {{-- <a href="{{ route('informes')}}"> --}}
                                        {{-- <input wire:click="agregar()" type="button" class="btn btn-info" value="Crear nuevos informes"> --}}
                                    {{-- </a> --}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Botones -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <x-guardar></x-guardar>
                    {{-- <x-cerrar></x-cerrar> --}}
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="show(1)" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-700 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cerrar
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- </div> --}}
