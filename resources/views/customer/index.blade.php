@extends('adminlte::page')
@section('title', 'Clientes')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="link-orange"> <i
                                class="fa fa-home"></i> Inicio</a></li>
                    <li class="breadcrumb-item active">Listado de Clientes del Negocio</li>
                </ol>
            </div>
            {{-- <div class="col-sm-6">
        <a href="{{ route('customers.create') }}"  class="btn btn-default btn-sm float-sm-right"  aria-disabled="true"><i class="fa fa-plus-square" ></i> Nuevo</a>

    </div> --}}
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    @if (session()->has('success'))
        <div style="opacity: 0.8" class="alert alert-success successMessage" role="alert">
            {{ session('success') }}

        </div>
    @endif
    @if (session()->has('error'))
        <div style="opacity: 0.8" class="alert alert-danger errorMessage" role="alert">
            {{ session('error') }}

        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <a href="{{ route('customers.create') }}"  class="btn btn-default btn-sm"  aria-disabled="true"><i class="fa fa-plus-square" ></i> Nuevo</a>
                    <a id="btnRemove" href="#" class="btn btn-danger btn-sm " aria-disabled="true"><i
                            class="fa fa-trash-alt"></i> Dar baja </a>
                    {{-- <a id="btnPayment" href="#" class="btn btn-primary btn-sm " aria-disabled="true"><i
                            class="fa fa-credit-card"></i> Registrar pago</a> --}}
                    <a id="btnMember" href="#" class="btn btn-success btn-sm " aria-disabled="true"><i
                            class="fa fa-id-card-alt"></i> Hacer socio</a>
                </div>
                <div class="col-4">
                    <input type="search" class="form-control form-control-sm" onkeyup="myFunction()" id="inputSearch"
                        placeholder="Buscar por nombres...">
                </div>
            </div>

        </div>
    </div>
    <div class="table-responsive">


        <table id="tbCustomer" class="table table-sm  table-hover table-striped">
            <thead class="thead-orange">
                <tr>
                    <th></th>
                    <th>NOMBRE</th>
                    <th>SEXO</th>
                    <th>TELÉFONO</th>
                    <th>CORREO ELECTRÓNICO</th>
                    <th>FECHA DE ALTA</th>
                    <th>SOCIO</th>
                    <th>TIPO DE PAGO</th>
                    <th>MONTO A PAGAR</th>
                    {{-- <th>ACCIONES</th> --}}
                    {{-- <th>ACCIONES</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>
                            <input type="checkbox" name="valor[]" id="{{ $customer->id }}" value="{{ $customer->id }}">
                        </td>
                        <td> {{ $customer->name . ' ' . $customer->last_name }}</td>
                        <td>
                            <span class="badge badge-secondary">{{ $customer->sex }}</span>
                        </td>
                        <td> {{ $customer->cellphone }}</td>
                        <td> {{ $customer->email }}</td>
                        <td> {{ $customer->hiring_date }}</td>
                        <td> {!! $customer->member == 'si' ? '<span class="badge badge-success">    <i class="fa fa-id-card-alt" aria-hidden="true"></i> </span>' : '<span class="badge badge-dark">NO</span>' !!}</td>
                        <td> {{ $customer->paymentType->name }}</td>
                        <td> {{ number_format($customer->paymentType->mount , 2, '.', ',');}} CUP</td>

                        {{-- <td> {{ $customer->member }}fa-credit-card
                    {{ $customer->member == "si" ? '<span class="badge badge-success">Success</span>' : '<span class="badge badge-dark">Success</span>' }}

                </td> --}}


                        {{-- <td  align="center" class="align-middle" style="width: 20%">
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-secondary btn-sm" title="Modificar">
                            <i class="fas fa-edit"></i> </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash-alt" title="Eliminar" aria-hidden="true"></i>  </button>
                    </form>
                </td> --}}

                    </tr>

                @endforeach
            </tbody>
        </table>
        {!! $customers->links() !!}
    </div>
@stop



@section('js')

    <script src="{{ asset('vendor/bootbox/bootbox.all.min.js') }}"></script>
    <script src="{{ asset('vendor/bootbox/bootbox.locales.min.js') }}"></script>
    <script src="{{ asset('js/customer.js') }}"></script>
    <script>



    </script>
@stop
