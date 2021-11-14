@extends('adminlte::page')
@section('title', 'Grupos')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="link-orange"> <i
                                class="fa fa-home"></i> Inicio</a></li>
                    <li class="breadcrumb-item active">Listado de Grupos</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('groups.create') }}" class="btn btn-default btn-sm float-sm-right"
                    aria-disabled="true"><i class="fa fa-plus-square"></i> Nuevo</a>

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

    <div class="table-responsive">
        <table id="tbType" class="table table-sm  table-hover table-striped">
            <thead class="thead-orange">
                <tr>
                    <th>GRUPO</th>
                    <th>ENTRENADOR</th>
                    <th>INICIA</th>
                    <th>ESTUDIANTES</th>
                    <th>HORA INICIO</th>
                    <th>HORA FIN</th>
                    <th>FRECUENCIAS</th>
                    <th style="text-align:center">DÍAS</th>
                    <th style="text-align:center">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>

                        {{-- <td style="width: 30%"> {{ $type->type }}</td>
                <td style="font-size: small"> {{ $type->description }}</td> --}}
                        <td style="width: 20%"> {{ $group->groupType->first()->type }}</td>

                        <td style="width: 25%">
                            @foreach ($group->employees as $value)
                                {{ $value->name . ' ' . $value->last_name }}<br>

                            @endforeach
                        </td>
                        <td> {{ $group->start_date }}</td>
                        <td  align="center" style="width: 5%"> {{ count($group->customers) }}</td>
                        <td> {{ $group->start }}</td>
                        <td> {{ $group->end }}</td>
                        @php
                            $frecuency = explode(',', $group->frecuency);
                            $cantFrecuency = count($frecuency);
                        @endphp

                        <td align="center"> <span class="badge badge-pill badge-dark">{{ $cantFrecuency }}</span> </td>
                        <td style="width: 30%">
                            @foreach ($frecuency as $item)
                                <span class="badge badge-info"> {{ $item }}</span>

                            @endforeach
                        </td>


                        <td align="center" class="align-middle" style="width: 20%">
                            <form action="{{ route('groups.destroy', $group->id) }}" method="post">
                                <a href="{{ route('groups.show', $group->id) }}" class="btn btn-primary btn-sm"
                                    title="Listado de estudiantes del grupo">
                                    <i class="fas fa-users"></i> </a>
                                <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-secondary btn-sm"
                                    title="Modificar">
                                    <i class="fas fa-edit"></i> </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash-alt"
                                        title="Eliminar" aria-hidden="true"></i> </button>
                            </form>
                        </td>

                    </tr>

                @endforeach
            </tbody>
        </table>
        {!! $groups->links() !!}
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('static/css/LineIcons.css') }}">
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
