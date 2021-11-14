@extends('adminlte::page')

@section('title', 'Tipo de Grupo')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home" ></i> Inicio</a></li> --}}
            <li class="breadcrumb-item"><a class="link-orange" href="{{ route('group-types.index') }}"> <i class="fa fa-list-alt" aria-hidden="true"></i>  Listado de Tipos de Grupo</a></li>
            <li class="breadcrumb-item active">Nuevo Tipo de Grupo</li>


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
                    <form method="POST" action="{{ route('group-types.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="InputTipo">Tipo de Grupo <span class="requiredField">* </span></label>
                            <input type="text" class="form-control form-control-sm" id="InputTipo"  name="type" placeholder="Tipo de Grupo "  required>
                            {!! $errors->first('type','<span class="text-danger errorMessage">:message</span>') !!}


                        </div>
                        <div class="form-group">
                            <label for="InputDescripcion">Descripción </label>
                            <textarea class="form-control" id="InputDescripcion" name="description" style="resize: none" rows="2"></textarea>
                            {!! $errors->first('type','<span class="text-danger errorMessage">:message</span>') !!}


                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="enabled" value="1" checked>
                            <label class="custom-control-label" for="customCheck1">Estado activo</label>
                          </div>
                        {{-- <a href="{{ url('cargos') }}" class="btn btn-outline-dark btn-sm active" role="button" aria-pressed="true">Volver al listado</a> --}}


                        {{-- &nbsp;&nbsp; --}}
                        <button style="margin-top: 1%" type="submit" class="btn btn-orange btn-sm">Guardar</button>

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
