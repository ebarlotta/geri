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
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nro. Habitación</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Ingrese Número de Habitación" wire:model="nrohabitacion">

                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Ingrese Número de Habitación" wire:model="descripcion">
                            <div class="flex justify-arround">
                                <div class="w-50 block mr-2">
                                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                                    <select name="activa" id="" wire:model="activa">
                                        <option value=""></option>
                                        <option value="1">Habilitada</option>
                                        <option value="0">Desabilitada</option>
                                    </select>
                                </div>
                                <div class="w50 block ml-2">
                                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Sexo Habitación</label>
                                    <select name="sexo" id="" wire:model="sexo">
                                        <option value=""></option>
                                        <option value="1">Masculino</option>
                                        <option value="0">Femenina</option>
                                    </select>
                                </div>
                                @error('estadocivil') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
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