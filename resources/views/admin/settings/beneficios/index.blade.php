@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')
    <h1>Configuraciones</h1>
@stop
{{-- @section('plugins.SweetAlert2',true) --}}

@livewireScripts

{{-- @section('content')
{{-- @livewire('bene') --}}
    {{-- <p>@livewire('cls-beneficios')</p> --}}
{{-- //@stop  --}}

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop