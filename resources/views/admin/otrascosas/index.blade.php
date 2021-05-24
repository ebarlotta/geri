<!-- @extends('adminlte::page') -->
@extends('layouts.enzo')


@section('title', 'Empresa1')



@section('content_header')
    <h1>Empresa</h1>
    
@stop

@section('content')

    <p>Welcome to this beautiful admin panel.
    Estas son las otras cosas
    </p>
    @include('livewire.crudbeneficios')

@stop

@livewireScripts