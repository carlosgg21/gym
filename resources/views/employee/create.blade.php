@extends('adminlte::page')

@section('title', 'Empleado')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home" ></i> Inicio</a></li> --}}
            <li class="breadcrumb-item"><a class="link-orange" href="{{ route('employees.index') }}"> <i class="fa fa-user" aria-hidden="true"></i>  Listado de Empleados</a></li>
            <li class="breadcrumb-item active">Nuevo  Empleado</li>


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
                    <form method="POST" action="{{ route('employees.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="InputCI">Indentificación <span class="requiredField">* </span></label>
                            <input type="text" class="form-control form-control-sm" id="InputCI"  name="ci" placeholder="Indentificación" required>
                            {!! $errors->first('ci','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="InputName">Nombre <span class="requiredField">* </span></label>
                            <input type="text" class="form-control form-control-sm" id="InputName"  name="name" placeholder="Nombre(s)" required>
                            {!! $errors->first('name','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="InputLast">Apellidos <span class="requiredField">* </span></label>
                            <input type="text" class="form-control form-control-sm" id="InputLast"  name="last_name" placeholder="Apellidos" required>
                            {!! $errors->first('last_name','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="InputHiring">Fecha de contratación <span class="requiredField">* </span></label>
                            <input type="date" class="form-control form-control-sm" id="InputHiring"  name="hiring_date" placeholder="Fecha de contratacion" required>
                            {!! $errors->first('hiring_date','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="SelectType">Ocupación <span class="requiredField">* </span></label>
                                <select class="form-control form-control-sm" id="SelectType" name="type_id" required>
                                    <option value="">--Seleccione una opción--</option>
                                    @foreach ($types as  $key => $type)
                                        <option value="{{ $key }}"> {{ $type }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="InputEmail">Correo electrónico </label>
                            <input type="email" class="form-control form-control-sm" id="InputEmail"  name="email" placeholder="Correo electronico" >
                            {!! $errors->first('email','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="InputCellphone">Teléfono</label>
                            <input type="text" class="form-control form-control-sm" id="InputCellphone"  name="cellphone" placeholder="Telefono" >
                            {!! $errors->first('cellphone','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>

{{--
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="SelectProvince">Provincia <span class="requiredField">* </span></label>
                            <select class="form-control form-control-sm" id="SelectProvince" name="province_id" required>
                                <option value="">--Seleccione una opcion--</option>
                                @foreach ($provinces as  $key => $province)
                                    <option value="{{ $key }}"> {{ $province }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="SelectTownsip">Municipio <span class="requiredField">* </span></label>
                            <select class="form-control form-control-sm" id="SelectTownsip" name="township_id" required>
                                <option value="">--Seleccione una provincia--</option>

                            </select>
                        </div>
                    </div>
                </div> --}}


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



        // $(document).ready(function() {
        //     $("#SelectProvince").change(function() {
        //         var id = $(this).val();

        //         $.getJSON('/towns/'+id, function(resp) {
        //             $("#SelectTownsip").empty();
        //             $.each(resp, function(k, v) {
        //                 $("#SelectTownsip").append('<option value="'+ v +'">'+ k +'</option>');
        //                 }); });
        //     });
        // });



// $(function () {
//     $("#tbUsuarios").DataTable({
//       "responsive": true,
//       "autoWidth": false,
//     });

//   });
</script>
@stop


