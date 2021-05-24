<div>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-jet-nav-link href="{{ route('crudBeneficios') }}" :active="request()->routeIs('crudBeneficios')">
            Beneficios
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('crudEstadosCiviles') }}" :active="request()->routeIs('crudEstadosCiviles')">
            Estados Civiles
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('crudTiposDePersonas') }}" :active="request()->routeIs('crudTiposDePersonas')">
            Tipos de Personas
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('crudTiposDeDocumentos') }}" :active="request()->routeIs('crudTiposDeDocumentos')">
            Tipos de Documentos
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('crudPersonActivo') }}" :active="request()->routeIs('crudPersonActivo')">
            Estados Personas
        </x-jet-nav-link>
    </div>
</div>