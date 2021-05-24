<!-- @extends('adminlte::page') -->

@section('title', 'Empresa')

@section('content_header')
    <h1>Empresa</h1>
@stop
@section('plugins.SweetAlert2',true)

@include('livewire.beneficios.crudbeneficios')
@section('content')
    <p>Welcome to this beautiful admin panel.
        Utilizando view/admin/index
    </p>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop