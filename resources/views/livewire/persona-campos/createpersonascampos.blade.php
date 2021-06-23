<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <!-- Nombre Campo -->
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Campo</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Ingrese Nombre del Campo" wire:model="NombreCampo">
                            @error('NombreCampo') <span class="text-red-500">{{ $message }}</span>@enderror
                            <!-- Tipo Campo -->

                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Tipo del Campo</label>
                            
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="TipoCampo">
                                <option value="">-</option>
                                <option value="Texto">Texto</option>
                                <option value="Numérico">Numérico</option>
                                <option value="Fecha">Fecha</option>
                            </select>
                            <!-- <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" 
                            placeholder="Ingrese Tipo del Campo" > -->

                            @error('TipoCampo') <span class="text-red-500">{{ $message }}</span>@enderror
                            <!-- Orden Campo -->
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Orden del Campo</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Ingrese Orden del Campo" wire:model="OrdenCampo">
                            @error('OrdenCampo') <span class="text-red-500">{{ $message }}</span>@enderror
                            
                            <!-- Label Campo -->
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Label del Campo</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Ingrese Label del Campo" wire:model="LabelCampo">
                            @error('LabelCampo') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <x-guardar></x-guardar>
                    <x-cerrar></x-cerrar>
                </div>
            </form>
        </div>
    </div>
</div>