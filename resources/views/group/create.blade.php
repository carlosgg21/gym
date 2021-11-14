@extends('adminlte::page')

@section('title', 'Grupo')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    {{-- <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home" ></i> Inicio</a></li> --}}
                    <li class="breadcrumb-item"><a class="link-orange" href="{{ route('groups.index') }}"> <i
                                class="fa fa-list-alt" aria-hidden="true"></i> Listado de Tipos de Grupo</a></li>
                    <li class="breadcrumb-item active">Nuevo Grupo</li>


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
                    <form method="POST" action="{{ route('groups.store') }}">
                        @csrf
                        <div class="form-group">

                            @php
                                $cont = 0;

                            @endphp

                            <label for="selectTrainer">Entrenadores <span class="requiredField">* </span></label>
                            <select multiple class="form-control" id="selectTrainer" name="employee_id[]">

                                @foreach ($trainers as $trainer)

                                    <option value="{{ $trainer->id }}"
                                        {{ old('employee_id.' . $cont) == $trainer->id ? 'selected="selected"' : '' }}>
                                        {{ $trainer->name . ' ' . $trainer->last_name }} </option>
                                @endforeach
                                @php
                                    $cont = 0;
                                @endphp
                            </select>
                            {!! $errors->first('employee_id', '<span class="text-danger errorMessage">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="SelectType">Tipo de grupo <span class="requiredField">* </span></label>
                            <select class="form-control form-control-sm" id="SelectType" name="group_type_id" required>
                                <option value="">--Seleccione una opcion--</option>
                                @foreach ($types as $key => $type)

                                    <option value="{{ $key }}"
                                        {{ old('group_type_id') == $key ? 'selected="selected"' : '' }}>
                                        {{ $type }} </option>

                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col">

                                <div class="form-group">
                                    <label for="InputStartDate">Fecha de comiezo del grupo <span class="requiredField">*
                                        </span></label>
                                    <input type="date" class="form-control form-control-sm" id="InputStartDate"
                                        name="start_date" placeholder="Fecha de comiezo" required>
                                    {!! $errors->first('start_date', '<span class="text-danger errorMessage">:message</span>') !!}
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="InputStart">Hora de incio clases <span class="requiredField">*
                                        </span></label>
                                    <input type="time" class="form-control form-control-sm" id="InputStar" name="start"
                                        placeholder="Hora de incio" value="{{ old('start') }}" required>
                                    {!! $errors->first('start', '<span class="text-danger errorMessage">:message</span>') !!}
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="InputEnd">Hora de fin clases <span class="requiredField">* </span></label>
                                    <input type="time" class="form-control form-control-sm" id="InputEnd" name="end"
                                        placeholder="Hora de fin " required>
                                    {!! $errors->first('end', '<span class="text-danger errorMessage">:message</span>') !!}
                                </div>

                            </div>
                        </div>


                        <label for="InputStartDate">Frecuencia de las clasees</label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="frecuency[]" value="Lunes" checked> --}}
                                <input style="cursor:pointer" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                    name="frecuency[]" value="Lunes" @if (is_array(old('frecuency')) && in_array('Lunes', old('frecuency'))) checked @endif>
                                <label class="form-check-label" for="inlineCheckbox1">Lunes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="frecuency[]" value="Martes" checked> --}}
                                <input style="cursor:pointer" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                    name="frecuency[]" value="Martes" @if (is_array(old('frecuency')) && in_array('Martes', old('frecuency'))) checked @endif>
                                <label class="form-check-label" for="inlineCheckbox2">Martes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="frecuency[]" value="Miércoles" checked> --}}
                                <input style="cursor:pointer" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                    name="frecuency[]" value="Miércoles" @if (is_array(old('frecuency')) && in_array('Miércoles', old('frecuency'))) checked @endif>
                                <label class="form-check-label" for="inlineCheckbox3">Miércoles</label>
                            </div>
                            <div class="form-check form-check-inline">
                                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="frecuency[]" value="Jueves" checked> --}}
                                <input style="cursor:pointer" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                    name="frecuency[]" value="Jueves" @if (is_array(old('frecuency')) && in_array('Jueves', old('frecuency'))) checked @endif>
                                <label class="form-check-label" for="inlineCheckbox4">Jueves</label>
                            </div>
                            <div class="form-check form-check-inline">
                                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name="frecuency[]" value="Viernes" checked> --}}
                                <input style="cursor:pointer" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                    name="frecuency[]" value="Viernes" @if (is_array(old('frecuency')) && in_array('Viernes', old('frecuency'))) checked @endif>
                                <label class="form-check-label" for="inlineCheckbox5">Viernes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox6" name="frecuency[]" value="Sábado" > --}}
                                <input style="cursor:pointer" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                    name="frecuency[]" value="Sábado" @if (is_array(old('frecuency')) && in_array('Sábado', old('frecuency'))) checked @endif>
                                <label class="form-check-label" for="inlineCheckbox6">Sábado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox7" name="frecuency[]" value="Domingo"> --}}
                                <input style="cursor:pointer" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                    name="frecuency[]" value="Domingo" @if (is_array(old('frecuency')) && in_array('Domingo', old('frecuency'))) checked @endif>
                                <label class="form-check-label" for="inlineCheckbox7">Domingo</label>
                            </div>
                        </div>
                        <div class="form-group student">
                            <hr>
                            <h3>ESTUDIANTES</h3>
                            <hr>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                <label class="form-check-label" for="checkAll">
                                    Seleccione todo
                                </label>
                            </div>
                            @foreach ($customers as $customer)

                                <div class="form-check">
                                    {{-- <input class="form-check-input" type="checkbox"  value="{{ $customer->id }}" id="{{ $customer->id }}" name="customer_id[]"> --}}
                                    <input style="cursor:pointer" class="form-check-input" type="checkbox"
                                        value="{{ $customer->id }}" name="customer_id[]" @if (is_array(old('customer_id')) && in_array($customer->id, old('customer_id'))) checked @endif>
                                    <label class="form-check-label" for="{{ $customer->id }}"
                                        title="Es miembro: {{ $customer->member }}">
                                        {{ $customer->name . ' ' . $customer->last_name }}
                                    </label>
                                </div>
                            @endforeach
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
        window.setTimeout(function() {
            $(".errorMessage").fadeTo(100, 0).slideUp(100, function() {
                $(this).remove();
            });
        }, 3000);
        window.setTimeout(function() {
            $(".successMessage").fadeTo(100, 0).slideUp(100, function() {
                $(this).remove();
            });
        }, 3000);

        $("#checkAll").click(function() {
            $('.student input:checkbox').not(this).prop('checked', this.checked);
        });
        // $(function () {
        //     $("#tbUsuarios").DataTable({
        //       "responsive": true,
        //       "autoWidth": false,
        //     });

        //   });
    </script>
@stop
