
@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')

@stop

@section('content')
<h1>Empresa</h1>
<div class="py-12">
    <x-slot name="header">
        <h2 class="text-center">CRUD Beneficios</h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-xm bg-lightgreen">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-green text-blue font-bold py-2 px-4 rounded my-3">Crear
                Beneficio</button>
            @if ($isModalOpen)
                @include('livewire.beneficios.createbeneficios')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Descripción</th>
                        <th class="px-4 py-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beneficios as $beneficio)
                        <tr>
                            <td class="border px-4 py-2">{{ $beneficio->id }}</td>
                            <td class="border px-4 py-2">{{ $beneficio->descripcionbeneficio }}</td>
                            <td>
                                <button wire:click="edit({{ $beneficio->id }})"
                                    class="bg-blue text-blue font-bold py-2 px-4 rounded">
                                    Editar
                                    <button wire:click="delete({{ $beneficio->id }})"
                                        class="bg-red hover:bg-red-700 text-blue font-bold py-2 px-4 rounded">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop