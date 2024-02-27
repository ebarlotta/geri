<div>
    <div class="row justify-content-center">
        @if($editpregunta) @include('livewire.informes.editpregunta') @endif
        @if($editinforme) @include('livewire.informes.editinforme') @endif

        <div class="card sm:col-11 col-md-5 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style="margin: 1%;box-shadow: 10px 5px 5px gray;" wire:click="Mostrar('Periodos')">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Periodos</h5>
                <p class="card-text">Agregue periodos para segmentar los informes.</p>

            </div>
        </div>
        <div class="card sm:col-11 col-md-5 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style="margin: 1%;box-shadow: 10px 5px 5px gray;" wire:click="Mostrar('Escalas')">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Escalas</h5>
                <p class="card-text">Diferentes tipos de escalas utilizadas.</p>
                <!-- <a href="#" class="btn btn-primary">Button</a> -->
            </div>
        </div>
        <div class="card sm:col-11 col-md-5 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style="margin: 1%; box-shadow: 10px 5px 5px gray;" wire:click="Mostrar('Informes')">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Informes</h5>
                <p class="card-text">Gestione todos los informes a utilizar.</p>
                <!-- <a href="#" class="btn btn-primary">Button</a> -->
            </div>
        </div>
        <div class="card sm:col-11 col-md-5 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style="margin: 1%;box-shadow: 10px 5px 5px gray;" wire:click="Mostrar('Preguntas')">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Preguntas</h5>
                <p class="card-text">Agregue todas las reguntas que va a utilizar en los informes.</p>
                <!-- <a href="#" class="btn btn-primary">Button</a> -->
            </div>
        </div>

        <div class="card col-11 shadow-md rounded-l-md transform transition duration-500 hover:scale-105" style=" margin-top: 2%;box-shadow: 10px 5px 5px gray;">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Area de trabajo</h5>
                <!-- Periodos -->
                @if($periodosview)                    
                    <table class="table table-striped">
                        <tr>
                            <td class="font-weight-bold">Nombre</td>
                            {{-- <td class="font-weight-bold col-1">
                                <div style="display: inline-flex;">
                                    <div> Opciones </div>
                                        <x-agregar2 id="1">Agregar</x-agregar2>
                                    <div>
                                </div>
                            </td> --}}
                        </tr>
                        @foreach($periodos as $periodo)
                        <tr>
                            <td>{{ $periodo->nombreperiodo }}</td>
                            {{-- <td class="col-1"><x-editar id="{{$periodo->id}}"></x-editar></td> --}}
                        </tr>
                        @endforeach
                    </table>
                    {{-- <button wire:click="create()" class="bg-green-300 hover:bg-green-400 text-white-900 font-bold px-4 rounded mx-2">
                        Agregar
                    </button> --}}
                @endif
                <!-- Escalas -->
                @if($escalasview)
                    <table class="table table-striped">
                        <tr>
                            <td class="font-weight-bold">Nombre</td>
                            <td class="font-weight-bold">Tipo</td>
                            <td class="font-weight-bold">Minimo</td>
                            <td class="font-weight-bold">Máximo</td>
                            <td class="font-weight-bold col-1">
                            <div style="display: inline-flex;">
                                <div> Opciones </div>
                                    <x-agregar2 id="1">Agregar</x-agregar2>
                                    <div>
                                </div>
                            </td>
                        </tr>
                        @foreach($escalas as $escala)
                        <tr>
                            <td>{{ $escala->nombreescala }}</td>
                            <td>{{ $escala->tipodatos }}</td>
                            <td>{{ $escala->minimo }}</td>
                            <td>{{ $escala->maximo }}</td>
                            <td class="col-1"><x-editar id="{{$escala->id}}"></x-editar></td>
                        </tr>
                        @endforeach
                    </table>
                @endif
                <!-- Informes -->
                @if($informesview)
                    <table class="table table-striped">
                        <tr>
                            <td class="font-weight-bold col-4">Nombre del Informe</td>
                            <td class="font-weight-bold col-2">Período</td>
                            <td class="font-weight-bold col-2">Area</td>
                            <td class="font-weight-bold col-3">Observaciones</td>
                            <td class="font-weight-bold col-1">
                                <div style="display: inline-flex;">
                                    <div> Opciones </div>
                                    <button wire:click="agregar(3)" class="hidden sm:flex bg-green-300 hover:bg-green-400 text-black-900 font-bold py-1 px-2 ml-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 mr-1" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M 11 2 L 11 11 L 2 11 L 2 13 L 11 13 L 11 22 L 13 22 L 13 13 L 22 13 L 22 11 L 13 11 L 13 2 Z"></path>
                                        </svg>
                                        Agregar
                                    </button>
                                    <div>
                                </div>
                            </td>
                        </tr>
                        @foreach($informes as $informe)
                        <tr>
                            <td class="col-4">{{ $informe->nombreinforme }}</td>
                            <td class="col-2">{{ $informe->periodo->nombreperiodo }}</td>
                            <td class="col-2">{{ $informe->area->areasdescripcion }}</td>
                            <td class="col-3">{{ $informe->observaciones }}</td>
                            <td class="col-1">
                                <button wire:click="editinforme({{ $informe->id }})" class="hidden sm:flex bg-blue-300 hover:bg-blue-400 text-black-900 font-bold px-4 mr-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                    Editar
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                @endif
                <!-- Preguntas -->
                @if($preguntasview)
                    <table class="table table-striped">
                        <tr>
                            <td class="font-weight-bold col-5">Texto de la Pregunta</td>
                            <td class="font-weight-bold col-1">Area</td>
                            <td class="font-weight-bold col-1">Escala Utilizada</td>
                            <td class="font-weight-bold col-2">Informe</td>
                            <td class="font-weight-bold col-1">
                            <div class="col-2" style="display: inline-flex;">
                                <div> Opciones </div>
                                <button wire:click="agregar(4)" class="hidden sm:flex bg-green-300 hover:bg-green-400 text-black-900 font-bold py-1 px-2 ml-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 mr-1" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M 11 2 L 11 11 L 2 11 L 2 13 L 11 13 L 11 22 L 13 22 L 13 13 L 22 13 L 22 11 L 13 11 L 13 2 Z"></path>
                                    </svg>
                                    Agregar
                                </button>
                            </td>
                        </tr>
                        @foreach($preguntas as $pregunta)
                        <tr>
                            <td class=" col-5">{{ $pregunta->textopregunta }}</td>
                            <td class="col-1">{{ $pregunta->nombrearea->areasdescripcion }}</td>
                            <td class="col-1">{{ $pregunta->nombreescala->nombreescala }}</td>
                            <td class="col-2">{{ $pregunta->informe->nombreinforme }}</td>
                            <td class="col-2">
                                <button wire:click="editpregunta({{ $pregunta->id }})" class="hidden sm:flex bg-blue-300 hover:bg-blue-400 text-black-900 font-bold px-4 mr-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                    Editar
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
        <a href="{{ route('actores')}}">
            <input type="button" class="btn btn-info" value="Volver a Gestión de Entidades">
        </a>
    </div>
</div>