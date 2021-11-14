@extends('adminlte::page')

@section('title', 'Tipo de Pago')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home" ></i> Inicio</a></li> --}}
            <li class="breadcrumb-item"><a class="link-orange" href="{{ route('payment-types.index') }}"> <i class="fa fa-user" aria-hidden="true"></i>  Listado de Tipos de Pago</a></li>
            <li class="breadcrumb-item active">Modificar Tipo de Pago</li>


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
                    <form method="POST" action="{{ route('payment-types.update',$type->id) }}">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label for="InputName">Tipo de pago <span class="requiredField">* </span></label>
                            <input type="text" class="form-control form-control-sm" id="InputName"  name="name" value="{{ $type->name }}" >
                            {!! $errors->first('name','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="InputDay">Cantidad  dias <span class="requiredField">* </span></label>
                            <input type="number" min="1" max="365" class="form-control form-control-sm" id="InputDay"  name="day" value="{{ $type->day }}" required>
                            {!! $errors->first('day','<span class="text-danger errorMessage">:message</span>') !!}
                            <small id="typeeHelp" class="form-text text-muted">Cantidad de dias que representa el tipo de pago. </small>
                        </div>
                        <div class="form-group">
                            <label for="InputMount">Monto a pagar <span class="requiredField">* </span></label>
                            <input type="text"   class="form-control form-control-sm" id="InputMount"  name="mount" value="{{ $type->mount }}">
                            {!! $errors->first('mount','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>
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


