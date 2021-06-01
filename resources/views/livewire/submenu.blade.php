<div>
    <div class="content-center flex">
        <div class="sm:space-x-8 sm:flex sm:-my-px sm:ml-10 sm:mx-auto ">
            <x-jet-nav-link href="{{ route('crudBeneficios') }}" :active="request()->routeIs('crudBeneficios')">
                Tipos de Beneficios
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
            <x-jet-nav-link href="{{ route('areas') }}" :active="request()->routeIs('areas')">
                Áreas
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('escolaridades') }}" :active="request()->routeIs('escolaridades')">
                Escolaridades
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('nacionalidades') }}" :active="request()->routeIs('nacionalidades')">
                Nacionalidades
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('localidades') }}" :active="request()->routeIs('localidades')">
                Localidades
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('provincias') }}" :active="request()->routeIs('provincias')">
                Provincias
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('gradodependencia') }}" :active="request()->routeIs('gradodependencia')">
                Grado de Dependencia
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('motivoegreso') }}" :active="request()->routeIs('motivoegreso')">
                Motivo de Egresos
            </x-jet-nav-link>
        </div>
    </div>
</div>