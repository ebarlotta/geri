<div>
    <div class="content-center flex">
        <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full flex justify-center">
            @if ($empresas)
                @foreach ($empresas as $empresa)
                    <div class="bg-gray-200 p-2 text-center rounded-lg shadow-lg w-auto m-1 justify-center">
                        <div wire:click="configurarempresa({{ $empresa['id'] }})" class="flex justify-end">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="gray">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                        </div>
                        <p class="relative -bottom-1 left-0 mx-2">
                            {{ $empresa['name'] }}
                        </p>
                        {{-- <img wire:click="cargamodulos({{ $empresa['id'] }})" class="rounded-md"
                            src="{{ asset('/images2/'.$empresa['imagen']) }}" style="margin: auto; margin-top: 10px; width: 150px; height: 150px;"> --}}
                    </div>
                @endforeach
            @else
                <div class="bg-gray-200 p-2 text-center rounded-lg shadow-lg w-auto m-1">
                    <p class="relative -bottom-11 left-0">
                        No hay empresas relacionadas con este usuario.
                    </p>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            <button style="background-color: indianred; width:100%;">
                            {{ __('Log Out') }}
                        </button>
                        </a>
                    </form>
                </div>
            @endif
        </div>
    </div>
