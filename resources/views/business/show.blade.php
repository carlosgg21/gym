@extends('adminlte::page')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home" ></i> Inicio</a></li> --}}
            <li class="breadcrumb-item"><a href="{{ route('testimonies.index') }}"> <i class="fa fa-arrow-alt-circle-left" ></i> Volver al Listado de  testomonios</a></li>
            <li class="breadcrumb-item active">Detalle del testimonio</li>
          </ol>
      </div>
      <div class="col-sm-6">

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
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Detalle Testimonnio del cliente </h3>

          <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">


                NOMBRE Y APELLIDOS DEL CLIENTE
                <p class="text-secondary"> {{ $testimony->full_name }}</p>
                CARGO CLIENTE
                <p class="text-secondary"> {{ $testimony->charge }}</p>
                TESTIMONIO
                <p class="text-secondary">{{ $testimony->text }}</p>
                VARLORACION DEL TESTIMONIO
                @switch($testimony->rating)
                @case(5)
                <td class="align-middle" >
                    <div class="text-warning">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                </td>
                @break
                @case(4)
                <td class="align-middle" >
                    <div class="text-warning">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                </td>
                @break
                @case(3)
                <td class="align-middle" >
                    <div class="text-warning">
                       <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                </td>
                @break
                @case(2)
                <td class="align-middle" >
                    <div class="text-warning">
                       <i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                </td>
                @break
                @case(1)
                <td class="align-middle" >
                    <div class="text-warning">
                        <i class="fa fa-star"></i>
                    </div>
                </td>
                @break
          @endswitch
                ESTADO DE PUBLICACION DEL TESTIMONIO<br>
                @if($testimony->state == 'nuevo')
                    <td class="align-middle" >
                        <span class="badge badge-primary">  {{ $testimony->state }} </span>

                    </td>
                    @elseif($testimony->state == 'publico')
                    <td class="align-middle" >
                        <span class="badge badge-success">  {{ $testimony->state }} </span>

                    </td>
                    @else
                    <td class="align-middle" >
                        <span class="badge badge-secondary">  {{ $testimony->state }} </span>

                    </td>
                    @endif

        </div>
        <div class="card-footer text-muted">
            <a href="{{ route('testimonies.index') }}" class="btn btn-secondary btn-sm">Volver al listado</a>
          </div>

      </div>
      <!-- /.card -->


@stop

@section('css')
<style>
    .checked {
  color: orange;
}
</style>
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
</script>
@stop
