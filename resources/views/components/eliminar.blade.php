@props(['id'])
<div>
    <!-- Desde 640 en adelante -->
    <button wire:click="delete({{$id}})" class="hidden sm:flex bg-red-300 hover:bg-red-400 text-red font-bold py-2 px-4 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        Eliminar
    </button>
    <!-- Menos 640 en adelante -->
    <button wire:click="delete({{$id}})" class="sm:hidden sm:flex bg-red-300 hover:bg-red-400 text-red font-bold py-2 px-4 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>