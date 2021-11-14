@extends('adminlte::page')
@section('title', 'Negocio')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li  class="breadcrumb-item"><a href="{{ route('home') }}" class="link-orange"> <i class="fa fa-home" ></i> Inicio</a></li>
            <li class="breadcrumb-item active">Datos del negocio</li>
          </ol>
      </div>
      <div class="col-sm-6">
        {{-- <a href="{{ route('businesss.create') }}"  class="btn btn-primary btn-sm float-sm-right"  aria-disabled="true"><i class="fa fa-plus-square" ></i> Nuevo directivo</a> --}}

      </div>
    </div>
  </div><!-- /.container-fluid -->
@stop

@section('content')
@if (session()->has('success'))
<div style="opacity: 0.8" class="alert alert-success successMessage" role="alert">
    {{ session('success') }}

</div>
@endif



      <!-- Default box -->
      <div class="card card-orange card-outline">
        {{-- <div class="card-header">
          <h3 class="card-title">Datos del negocio </h3>

          <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div> --}}
        <div class="card-body">

            <div class="row">
                <div class="col-3">
                <img src="{{asset('/storage/logo/logo.jpg' ) }}" alt="logo" class="img-thumbnail">
                </div>
                <div class="col">
                    <dl>
                        <dt>NEGOCIO</dt>
                         <dd>{{ $business->name}}<br>
                      {{ $business->acronym }}</dd>
                        <dt>SLOGAN</dt>
                        <dd>{{ $business->slogan}}</dd>
                    </dl>
                </div>
                <div class="col">

                        <strong>DIRECCION</strong><br>
                        {{ $business->address}} <br>

                        <abbr title="Telefono"> <i class="fa fa-phone-square" aria-hidden="true"></i></abbr> {{ $business->phone}}<br>

                        {{-- <strong>CORREO ELECTRONICO</strong><br> --}}
                          <i class="fa fa-envelope"></i>  {{ $business->email}}<br>
                          <i class="fa fa-link"></i>  {{ $business->web_site}}<br>

                </div>
        </div>





    </div>
    <a href="{{ route('businesses.edit', $business->id) }}" title="Modificar"
        class="btn btn-secondary btn-sm"> <i class="fas fa-edit "></i>
    </a>
      <!-- /.card -->


@stop

@section('css')
<link rel="stylesheet" href="{{ asset('static/css/LineIcons.css') }}">
@stop

@section('js')
<script>

window.setTimeout(function(){
    $(".errorMessage").fadeTo(100,0).slideUp(100,function(){
        $(this).remove();
    });
},3000);
window.setTimeout(function(){
    $(".successMessage").fadeTo(100,0).slideUp(100,function(){
        $(this).remove();
    });
},3000);
</script>
@stop
