@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')
    <h1>Configuraciones</h1>
@stop

@livewireScripts

@section('content')
{{-- @livewire('bene') --}}
    <p>Menú principal de Configuraciones</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop