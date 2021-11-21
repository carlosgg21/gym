@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Dashboard</h1> --}}
    <h1>GYM</h1>
@stop

@section('content')
    <p >Una plataforma para los propietarios de gimnasios y estudios de fitness que desean ahorrar tiempo y gestionar su base de clientes. Permiten tener el control de tu negocio, por lo que no tienes que preocuparte por las cosas pequeñas: desde la programación y la gestión de miembros hasta los pagos y la generación de informes.</p>



<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"> <strong>CLIENTES</strong></span>
          <span class="info-box-number">
              <h3>{{ $data['customers'] }}     </h3>

          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box mb-4">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-paste"></i></span>

        <div class="info-box-content">
            <span class="info-box-text"> <strong>GRUPOS</strong></span>
            <span class="info-box-number">
                <h3>{{ $data['groups'] }}     </h3>

            </span>
          </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box mb-4">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-tag"></i></span>

        <div class="info-box-content">
            <span class="info-box-text"> <strong>EMPLEADOS</strong></span>
            <span class="info-box-number">
                <h3>{{ $data['employees'] }}     </h3>

            </span>
          </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->


  </div>
  <!-- /.row -->

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
