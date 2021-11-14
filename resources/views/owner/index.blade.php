@extends('adminlte::page')
@section('title', 'Propietarios')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb ">
            <li  class="breadcrumb-item"><a href="{{ route('home') }}" class="link-orange"> <i class="fa fa-home" ></i> Inicio</a></li>
            <li class="breadcrumb-item active">Listado de Propietarios del Negocio</li>
          </ol>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('owners.create') }}"  class="btn btn-default btn-sm float-sm-right"  aria-disabled="true"><i class="fa fa-plus-square" ></i> Nuevo</a>

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


<table id="tbType" class="table table-sm  table-hover table-striped">
    <thead class="thead-orange">
            <tr>
                <th>NOMBRE</th>
                <th>TELÉFONO</th>
                <th>CORREO ELECTRÓNICO</th>
                <th>ACCIONES</th>
                {{-- <th>ACCIONES</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($owners as $owner)
            <tr>
                <td> {{ $owner->full_name }}</td>
                <td> {{ $owner->cellphone }}</td>
                <td> {{ $owner->email }}</td>

                {{-- <td>
                    <form action="{{ route('owners.destroy',$owner->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('owners.show',$owner->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('owners.edit',$owner->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td> --}}
                <td  align="center" class="align-middle" style="width: 20%">
                    <form action="{{ route('owners.destroy', $owner->id) }}" method="post">
                        <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-secondary btn-sm" title="Modificar">
                            <i class="fas fa-edit"></i> </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash-alt" title="Eliminar" aria-hidden="true"></i>  </button>
                    </form>
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>
    {!! $owners->links() !!}

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
