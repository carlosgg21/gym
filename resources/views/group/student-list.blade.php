@extends('adminlte::page')
@section('title', 'Listado Esdudiantes')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a class="link-orange" href="{{ route('groups.index') }}"> <i class="fa fa-list-alt" aria-hidden="true"></i>  Listado de Grupos</a></li>
                    <li class="breadcrumb-item active">Listado de Estudiantes</li>
                </ol>
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

    <div class="card border-dark">

        <div class="card-body text-dark">
            <div class="row">
                <div class="col-sm">
                    <h3>
                        <small class="text-muted">Grupo de:</small>
                        {{ $data->groupType->first()->type }}
                    </h3>

                    <dl class="row">
                        {!! count($data->employees) > 1 ? ' <dt class="col-sm-3">Profesores</dt>' : ' <dt class="col-sm-3">Profesor</dt>' !!}

                        <dd class="col-sm-8">
                            @foreach ($data->employees as $trainer)
                                {{ $trainer->name . ' ' . $trainer->last_name }}<br>
                            @endforeach
                        </dd>

                    </dl>

                </div>
                <div class="col-sm">
                    <strong>Fecha de Comienzo</strong><br>
                    {{ $data->start_date }}<br>
                    <strong>Hora de Comienzo y Fin</strong><br>
                    {{ $data->start . '-' . $data->end }}

                </div>
                <div class="col-sm-4">
                    @php
                        $frecuency = explode(',', $data->frecuency);
                        $cantFrecuency = count($frecuency);
                    @endphp
                    <span class="badge badge-pill badge-dark">Frecuencia {{ $cantFrecuency }}</span><br>
                    @foreach ($frecuency as $item)
                        <span class="badge badge-info" style="font-size: medium;padding: inherit;height: 20%">
                            {{ $item }}</span>

                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead class="thead-orange">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">SEXO</th>
                    <th scope="col">EDAD</th>
                    <th scope="col">SOCIO</th>
                    <th scope="col">TELÉFONO</th>
                    <th scope="col">CORREO ELECTRÓNICO</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $cont = 1;
                @endphp
                @foreach ($data->customers as $customer)
                    <tr>

                        <td scope="row">{{ $cont }}</td>
                        <td>{{ $customer->name . ' ' . $customer->last_name }}</td>
                        <td>
                            <span class="badge badge-secondary">{{ $customer->sex }}</span>
                        </td>
                        <td> {{ $customer->age }}</td>
                        <td> {!! $customer->member == 'si' ? '<span class="badge badge-success">    <i class="fa fa-id-card-alt" aria-hidden="true"></i> </span>' : '<span class="badge badge-dark">NO</span>' !!}</td>
                        <td> {{ $customer->cellphone }}</td>
                        <td> {{ $customer->email }}</td>

                    </tr>
                    @php
                        $cont++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>



@stop

@section('css')

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
    </script>
@stop
