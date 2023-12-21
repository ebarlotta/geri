@props(['id'])
<div>
    <!-- Desde 640 en adelante -->
    <button wire:click="agregar({{ $id }})" class="hidden sm:flex bg-green-300 hover:bg-green-400 text-black-900 font-bold py-2 px-4 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 mr-1" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M 11 2 L 11 11 L 2 11 L 2 13 L 11 13 L 11 22 L 13 22 L 13 13 L 22 13 L 22 11 L 13 11 L 13 2 Z"></path>
        </svg>
        Agregar
    </button>
    <!-- Menos 640 en adelante -->
    <button wire:click="agregar({{ $id }})" class="sm:hidden sm:flex bg-green-300 hover:bg-green-400 text-black-900 font-bold py-2 px-4 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="h-6 w-6 mr-1" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M 11 2 L 11 11 L 2 11 L 2 13 L 11 13 L 11 22 L 13 22 L 13 13 L 22 13 L 22 11 L 13 11 L 13 2 Z"></path>
        </svg>
    </button>
</div>
