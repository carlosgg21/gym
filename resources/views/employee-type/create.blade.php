@extends('adminlte::page')

@section('title', 'Tipo de empleado')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home" ></i> Inicio</a></li> --}}
            <li class="breadcrumb-item"><a class="link-orange" href="{{ route('types.index') }}"> <i class="fa fa-list-alt" aria-hidden="true"></i>  Listado de Tipos de Empleado</a></li>
            <li class="breadcrumb-item active">Nuevo Tipo Empleado</li>


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
                    <form method="POST" action="{{ route('types.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="InputTipo">Tipo de empleado <span class="requiredField">* </span></label>
                            <input type="text" class="form-control form-control-sm" id="InputTipo"  name="type" placeholder="Tipo de empleado" required>
                            {!! $errors->first('type','<span class="text-danger errorMessage">:message</span>') !!}
                            <small id="typeeHelp" class="form-text text-muted">Nuevo tipo de empleado. </small>

                        </div>
                        {{-- <a href="{{ url('cargos') }}" class="btn btn-outline-dark btn-sm active" role="button" aria-pressed="true">Volver al listado</a> --}}


                        {{-- &nbsp;&nbsp; --}}
                        <button type="submit" class="btn btn-orange btn-sm">Guardar</button>

                    </form>
                </div>
              </div>
        </div>
    </div>


@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
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
