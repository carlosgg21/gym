@extends('adminlte::page')
@section('title', 'Directivos')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home" ></i> Inicio</a></li> --}}
            <li class="breadcrumb-item"><a href="{{ route('teams.index') }}"> <i class="fa fa-arrow-alt-circle-left" ></i> Volver al Listado de directivos</a></li>
            <li class="breadcrumb-item active">Nuevo Directivo</li>
          </ol>
      </div>
      <div class="col-sm-6">

      </div>
    </div>
  </div><!-- /.container-fluid -->
@stop

@section('content')

    <div class="row">

        <div class="col-8">
            @if (session()->has('success'))
            <div style="opacity: 0.8" class="alert alert-success successMessage" role="alert">
                {{ session('success') }}
              </div>
              @endif
            <div class="card card-primary">
                <div class="card-header">
                  Nuevo directivo
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('teams.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="InputNombre">Nombre* </label>
                            <input type="text" class="form-control form-control-sm" id="InputNombre"  name="name" placeholder="Nombre" >
                            {!! $errors->first('name','<span class="text-danger errorMessage">:message</span>') !!}
                            <small id="NamenHelp" class="form-text text-muted">Nombre del directivo de la empresa. </small>
                        </div>
                        <div class="form-group">
                            <label for="InputApellidos">Apellidos * </label>
                            <input type="text" class="form-control form-control-sm" id="InputApellidos"  name="last_name" placeholder="Apellidos" >
                            {!! $errors->first('last_name','<span class="text-danger errorMessage">:message</span>') !!}
                            <small id="LastNHelp" class="form-text text-muted">Apellidos del directivo de la empresa. </small>
                        </div>
                        <div class="form-group">
                            <label for="FormControlCargos">Cargo * </label>
                            <select  class="form-control form-control-sm" id="FormControlCargos" name="charge_id">
                              <option value="">--Seleccione un elemento--</option>
                              @foreach ($charges as $cargo)
                                <option value="{{ $cargo->id }}">{{ $cargo->charge }}</option>

                              @endforeach
                            </select>
                            {!! $errors->first('charge_id','<span class="text-danger errorMessage">:message</span>') !!}
                            <small id="CargoHelp" class="form-text text-muted">Cargo del directivo en la empresa. </small>
                        </div>
                        <div class="form-group">
                            <label for="FormControlFile1">Foto del directivo</label>
                            <input type="file" class="form-control-file" id="FormControlFile1" name="photo">
                          </div>
                        <div class="form-group">
                            <label for="InputCorreo">Correo electronico * </label>
                            <input type="email" class="form-control form-control-sm" id="InputCorreo"  name="email" placeholder="Correo Electronico" >
                            {!! $errors->first('email','<span class="text-danger errorMessage">:message</span>') !!}
                            <small id="CorreoHelp" class="form-text text-muted">Correo electronico del directivo de la empresa. </small>
                        </div>

                        <div class="form-group">
                            <label for="InputTelf">Telefono* </label>
                            <input type="text" class="form-control form-control-sm" id="InputTelf"  name="phone" placeholder="Telefono" >
                            {!! $errors->first('phone','<span class="text-danger errorMessage">:message</span>') !!}
                             <small id="TelfHelp" class="form-text text-muted">Telefono electronico del directivo de la empresa. </small>
                        </div>
                        <p class="text-info">Redes Sociales</p>
                        <div class="row">


                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="InputFacebook">Facebook </label>
                                    <input type="text" class="form-control form-control-sm" id="InputFacebook"  name="facebook" placeholder="Facebook" >
                                    {!! $errors->first('facebook','<span class="text-danger errorMessage">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="InputTwitter">Twitter </label>
                                    <input type="text" class="form-control form-control-sm" id="InputTwitter"  name="twitter" placeholder="Twitter" >
                                    {!! $errors->first('twitter','<span class="text-danger errorMessage">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="InputLinkedin">Linkedin </label>
                                    <input type="text" class="form-control form-control-sm" id="InputLinkedin"  name="linkedin" placeholder="Linkedin" >
                                    {!! $errors->first('linkedin','<span class="text-danger errorMessage">:message</span>') !!}
                                </div>
                            </div>
                          </div>

                          <br>
                        {{-- &nbsp;&nbsp; --}}
                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>

                    </form>
                </div>
              </div>
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

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


// $(function () {
//     $("#tbUsuarios").DataTable({
//       "responsive": true,
//       "autoWidth": false,
//     });

//   });
</script>
@stop
