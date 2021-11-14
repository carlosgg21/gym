@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home" ></i> Inicio</a></li> --}}
            <li class="breadcrumb-item"><a class="link-orange" href="{{ route('customers.index') }}"> <i class="fa fa-user" aria-hidden="true"></i>  Listado de Clientes</a></li>
            <li class="breadcrumb-item active">Nuevo  Cliente</li>


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
                    <form method="POST" action="{{ route('customers.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="InputCI">Indentificación <span class="requiredField">* </span></label>
                            <input type="text" min="8" max="20" class="form-control form-control-sm" id="InputCI"  name="ci" placeholder="Indentificación" autofocus>
                            {!! $errors->first('ci','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="InputName">Nombre <span class="requiredField">* </span></label>
                            <input type="text" class="form-control form-control-sm" id="InputName"  name="name" placeholder="Nombre(s)" required >
                            {!! $errors->first('name','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="InputLast">Apellidos <span class="requiredField">* </span></label>
                            <input type="text" class="form-control form-control-sm" id="InputLast"  name="last_name" placeholder="Apellidos" required >
                            {!! $errors->first('last_name','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>

                        <div class="row">
                            <div class="col">

                                <div class="form-group">
                                    <label for="InputAge">Edad </label>
                                    <input type="number" min="10" max="120" class="form-control form-control-sm" id="InputAge"  name="age" placeholder="Edad" >
                                    {!! $errors->first('age','<span class="text-danger errorMessage">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col">

                            <div class="form-group">
                                <label for="SelectSex">Sexo  <span class="requiredField">* </span></label>
                                <select class="form-control form-control-sm" id="SelectSex" name="sex" required>
                                    <option value="">--Seleccione una opción--</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    <option value="O">Otros</option>

                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="InputHiring">Fecha de alta <span class="requiredField">* </span></label>
                            <input type="date" class="form-control form-control-sm" id="InputHiring"  name="hiring_date" placeholder="Fecha de alta" required>
                            {!! $errors->first('hiring_date','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <label for="SelectPaymentType">Tipo de pago <span class="requiredField">* </span> </label>
                            <select class="form-control form-control-sm" id="SelectPaymentType" name="payment_type_id" required>
                                <option value="">--Seleccione una opción--</option>
                                @foreach ($paymentTypes as  $key => $type)
                                <option value="{{ $key }}"> {{ $type }} </option>

                                @endforeach


                            </select>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                               La forma de pago selecionada equivale al pago de <strong><span id="paymentMount"></span> </strong> CUP por cliente.
                              </small>
                        </div>


                        <div class="form-group">
                            <label for="InputEmail">Correo electrónico </label>
                            <input type="email" class="form-control form-control-sm" id="InputEmail"  name="email" placeholder="Correo electrónico" >
                            {!! $errors->first('email','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="InputCellphone">Teléfono</label>
                            <input type="text" class="form-control form-control-sm" id="InputCellphone"  name="cellphone" placeholder="Teléfono" >
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


const formatToCurrency = amount => {
  return  amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
};

$("#SelectPaymentType").change(function(){

   $.get( "../mount/"+ this.value , function( data ) {

$('#paymentMount').text(formatToCurrency(data[0]))
// $('#paymentMount').text(data[0])
});
});

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


