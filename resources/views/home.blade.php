@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Dashboard</h1> --}}
    <h1>GYM</h1>
@stop

@section('content')
    <p >Una plataforma para los propietarios de gimnasios y estudios de fitness que desean ahorrar tiempo y gestionar su base de clientes. Permiten tener el control de tu negocio, por lo que no tienes que preocuparte por las cosas pequeñas: desde la programación y la gestión de miembros hasta los pagos y la generación de informes.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
