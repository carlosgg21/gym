@extends('adminlte::page')

@section('title', 'Propietario')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home" ></i> Inicio</a></li> --}}
            <li class="breadcrumb-item"><a class="link-orange" href="{{ route('owners.index') }}"> <i class="fa fa-list-alt" aria-hidden="true"></i>  Propietarios</a></li>
                      <li class="breadcrumb-item active">Nuevo Propietario</li>


          </ol>
      </div>
      <div class="col-sm-6">

      </div>
    </div>
  </div><!-- /.container-fluid -->
@stop

@section('content')

    <div class="row">

        <div class="col-12">
            @if (session()->has('success'))
            <div style="opacity: 0.8" class="alert alert-success successMessage" role="alert">
                {{ session('success') }}
              </div>
              @endif
              <div class="card card-orange card-outline">

                <div class="card-body">
                    <form method="POST" action="{{ route('owners.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="InputFullName">Nombre y Apellidos <span class="requiredField">* </span></label>
                            <input type="text" class="form-control form-control-sm" id="InputFullName"  name="full_name" placeholder="Nombre y Apellidos" >
                            {!! $errors->first('full_name','<span class="text-danger errorMessage">:message</span>') !!}


                        </div>
                        <div class="form-group">
                            <label for="InputEmail">Correo electrónico </label>
                            <input type="email" class="form-control form-control-sm" id="InputEmail"  name="email" placeholder="Correo electrónico" >
                            {!! $errors->first('email','<span class="text-danger errorMessage">:message</span>') !!}


                        </div>

                        <div class="form-group">
                            <label for="InputTelf">Teléfono </label>
                            <input type="text" class="form-control form-control-sm" id="InputTelf"  name="cellphone" placeholder="Telefono" >
                            {!! $errors->first('cellphone','<span class="text-danger errorMessage">:message</span>') !!}


                        </div>


                        {{-- &nbsp;&nbsp; --}}
                        <button type="submit" class="btn btn-orange btn-sm">Guardar</button>

                    </form>
                </div>
              </div>
        </div>
    </div>


@stop
