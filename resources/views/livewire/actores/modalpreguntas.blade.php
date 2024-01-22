<div>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
            <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle col-8 sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <!-- <form class="col-12"> -->
                <!-- Controles -->
                
                
                <div class="container">
                <b>Nombred del Informe:  {{ $nombredelinforme }}</b>
                <table class="border-2 table-striped table" style="width: 100%;">
                <tr>
                    <td><b>Pregunta</b></td>
                    <td style="text-align: center"><b>Respuesta</b></td>
                </tr>
                @foreach($bancopreguntas as $pregunta)
                    @if($pregunta->nombreescala=='Lógica')
                        <tr>
                            <td>
                                {{ $pregunta->textopregunta }}
                            </td>
                            <td class="col-3" style="text-align: center" colspan=2>
                                <input class="mr-1" type="checkbox" wire:click="TomarRespuesta({{ $pregunta->id }},1,'')">SI<input class="ml-3 mr-1" type="checkbox" wire:click="TomarRespuesta({{ $pregunta->id }},0,'')">NO
                            </td>
                        </tr>
                    @endif
                    @if($pregunta->nombreescala=='Numérica')
                        <tr>
                            <td>
                                {{ $pregunta->textopregunta }}
                            </td>
                            <td class="col-3" >
                            <form wire:submit.prevent="submit">
                                @csrf
                                <input type="hidden" wire:model="preguntaId">
                                <textarea ></textarea>
                                {{-- <textarea wire:model="temporal" required></textarea> --}}
                                <button type="submit">Enviar respuesta</button>
                            </form>
    <!-- Cantidad: <input class="mr-1 shadow bg-gray-300" type="textbox" size="10" wire:change.prevent="TomarRespuesta({{ $pregunta->id }}, {{ $temporal }},'')" wire:model="temporal"> -->
                            </td>
                        </tr>
                    @endif
                    @if($pregunta->nombreescala=='Pocentaje')
                        <tr>
                            <td>
                                {{ $pregunta->textopregunta }}
                            </td>
                            <td class="col-3" >Cantidad porcentaje: <input class="mr-1 shadow bg-gray-300" type="textbox" size="10"></td>
                        </tr>
                    @endif
                
                @endforeach
            </table>

                </div>


                <!-- Botones -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <x-guardar></x-guardar>
                    {{-- <x-cerrar></x-cerrar> --}}
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="closeModalPreguntas()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-700 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cerrar
                        </button>
                    </span>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>
{{-- </div> --}}
