@extends('adminlte::page')
@section('title', 'Modificar')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home" ></i> Inicio</a></li> --}}
            <li class="breadcrumb-item"><a class="link-orange" href="{{ route('businesses.index') }}"> <i class="fa fa-building" ></i> Datos del Negocio</a></li>
            <li class="breadcrumb-item active">Modificar Datos del Negocio</li>
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
                    <form method="POST" action="{{ route('businesses.update',$business->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="InputNegocios" >Negocio <span class="requiredField">* </span> </label>
                            <input type="text" class="form-control form-control-sm" id="InputNegocios"  name="name" value="{{ $business->name }}" >
                            {!! $errors->first('name','<span class="text-danger errorMessage">:message</span>') !!}
                            {{-- <small id="LastNHelp" class="form-text text-muted">Apellidos del directivo de la empresa. </small> --}}
                        </div>
                        <div class="form-group">
                            <label for="InputAcronym" >Nombre corto  </label>
                            <input type="text" class="form-control form-control-sm" id="InputAcronym"  name="acronym" value="{{ $business->acronym }}" >
                            {!! $errors->first('acronym','<span class="text-danger errorMessage">:message</span>') !!}
                            {{-- <small id="LastNHelp" class="form-text text-muted">Apellidos del directivo de la empresa. </small> --}}
                        </div>
                        <div class="form-group">
                            <label for="InputSlogan" >Slogan  </label>

                            <textarea class="form-control" id="InputSlogan" rows="2"  name="slogan">{{ $business->slogan }}
                            </textarea>

                            {!! $errors->first('slogan','<span class="text-danger errorMessage">:message</span>') !!}

                        </div>



                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="InputEmail" >Correo electrónico  </label>
                                    <input type="email" class="form-control form-control-sm" id="InputEmail"  name="email" value="{{ $business->email }}" >
                                    {!! $errors->first('email','<span class="text-danger errorMessage">:message</span>') !!}
                                    {{-- <small id="LastNHelp" class="form-text text-muted">Apellidos del directivo de la empresa. </small> --}}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="InputPhone" >Teléfono   </label>
                                    <input type="text" class="form-control form-control-sm" id="InputPhone"  name="phone" value="{{ $business->phone }}" >
                                    {!! $errors->first('phone','<span class="text-danger errorMessage">:message</span>') !!}
                                    {{-- <small id="LastNHelp" class="form-text text-muted">Apellidos del directivo de la empresa. </small> --}}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="InputWeb" >Sitio Web   </label>
                                    <input type="text" class="form-control form-control-sm" id="InputWeb"  name="web_site" value="{{ $business->web_site }}" >
                                    {!! $errors->first('web_site','<span class="text-danger errorMessage">:message</span>') !!}
                                    {{-- <small id="LastNHelp" class="form-text text-muted">Apellidos del directivo de la empresa. </small> --}}
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="InputDireccion" >Dirección del Negocio  </label>

                            <textarea class="form-control" id="InputDireccion" rows="2"  name="address">{{ $business->address }}
                            </textarea>

                            {!! $errors->first('address','<span class="text-danger errorMessage">:message</span>') !!}

                        </div>
                        <button type="submit" class="btn btn-orange btn-sm">Modificar</button>
                    </form>

                </div>
              </div>
        </div>
    </div>


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
