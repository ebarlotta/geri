<div>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
            <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle col-8 sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form class="col-12">
                <!-- Controles -->
                
                
                <div class="container">
                    <b>{{ $nombredelinforme }}</b>
                    <table class="table table-striped">
                        <tr>
                            <td>Pregunta</td>
                            <td style="text-align: center">Respuesta</td>
                        </tr>
                        @foreach($informeespecifico as $informe)
                        <tr>
                            <td>
                                {{ $informe->textopregunta }} 
                            </td>
                            <td class="col-3" style="text-align: center">
                                @if($informe->escala_id==1) 
                                    @if($informe->cantidad==1)
                                        <input class="mr-1" type="checkbox" checked>SI<input class="ml-3 mr-1" type="checkbox">NO
                                    @else
                                        <input class="mr-1" type="checkbox">SI<input class="ml-3 mr-1" type="checkbox" checked>NO
                                    @endif
                                @endif
                                @if($informe->escala_id==2)
                                    <div>
                                        <div>
                                            0 <progress id="file" max="100" value="70" style="height: 10px;vertical-align: inherit;background-color: darkgray; margin-left: 3px; margin-right: 3px; border-radius: 5px"></progress> 100
                                        </div>
                                        <p style="position: relative; top:-9px;font-size: 12px;">70</p>
                                    </div>
                                @endif

                            </td>
                        </tr>
                            
                            <!-- <p> Cantidad: {{ $informe->cantidad }} </p> -->
                        @endforeach
                    </table>
                </div>


                <!-- Botones -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <x-guardar></x-guardar>
                    {{-- <x-cerrar></x-cerrar> --}}
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="closeModalInformeEspecifico()" type="button"
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
