@extends('adminlte::page')

@section('title', 'Grupo')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home" ></i> Inicio</a></li> --}}
            <li class="breadcrumb-item"><a class="link-orange" href="{{ route('groups.index') }}"> <i class="fa fa-list-alt" aria-hidden="true"></i>  Listado de Tipos de Grupo</a></li>
            <li class="breadcrumb-item active">Modificar Grupo</li>


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
                    <form method="POST" action="{{ route('groups.update',$group->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="selectTrainer">Entrenadores</label>
                            <select multiple class="form-control" id="selectTrainer" name="employee_id[]" required>

                                @foreach ($trainers as $trainer)
                                    @if ( in_array($trainer->id, $employees))
                                     <option value="{{ $trainer->id }}" selected> {{ $trainer->name.' '.$trainer->last_name }} </option>
                                    @else
                                    <option value="{{ $trainer->id }}" > {{ $trainer->name.' '.$trainer->last_name }} </option>

                                    @endif

                                @endforeach

                            </select>
                          </div>
                        <div class="form-group">
                            <label for="SelectType">Tipo de grupo <span class="requiredField">* </span></label>
                            <select class="form-control form-control-sm" id="SelectType" name="group_type_id" required>
                                @foreach ($types as  $key => $type)
                                @if ($group->type_id == $key)
                                <option value="{{ $key }}" selected> {{ $type }} </option>
                                @else
                                <option value="{{ $key }}"> {{ $type }} </option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="InputStartDate">Fecha de comiezo del grupo <span class="requiredField">* </span></label>
                            <input type="date" class="form-control form-control-sm" id="InputStartDate"  name="start_date" value="{{ $group->start_date }}" required>
                            {!! $errors->first('start_date','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="InputStart">Hora de incio clases <span class="requiredField">* </span></label>
                            <input type="time" class="form-control form-control-sm" id="InputStar"  name="start" value="{{ $group->start }}"  required>
                            {!! $errors->first('start','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="InputEnd">Hora de fin clases <span class="requiredField">* </span></label>
                            <input type="time" class="form-control form-control-sm" id="InputEnd"  name="end" value="{{ $group->end }}"  required>
                            {!! $errors->first('end','<span class="text-danger errorMessage">:message</span>') !!}
                        </div>
                        <label for="InputStartDate">Frecuencia de las clasees</label>
                        @php
                               $frecuency = explode(',', $group->frecuency);

                        @endphp
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="frecuency[]" value="Lunes"  {{ in_array("Lunes", $frecuency) ? 'checked' : '' }} >
                                <label class="form-check-label" for="inlineCheckbox1">Lunes</label>
                              </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="frecuency[]" value="Martes" {{ in_array("Martes", $frecuency) ? 'checked' : '' }} >
                                <label class="form-check-label" for="inlineCheckbox2">Martes</label>
                              </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="frecuency[]" value="Miércoles" {{ in_array("Miércoles", $frecuency) ? 'checked' : '' }} >
                                <label class="form-check-label" for="inlineCheckbox3">Miércoles</label>
                              </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="frecuency[]" value="Jueves" {{ in_array("Jueves", $frecuency) ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox4">Jueves</label>
                              </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name="frecuency[]" value="Viernes" {{ in_array("Viernes", $frecuency) ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox5">Viernes</label>
                              </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="frecuency[]" value="Sábado" {{ in_array("Sábado", $frecuency) ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox6">Sábado</label>
                              </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox7" name="frecuency[]" value="Domingo" {{ in_array("Domingo", $frecuency) ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineCheckbox7">Domingo</label>
                              </div>
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
