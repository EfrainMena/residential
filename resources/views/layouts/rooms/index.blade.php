@extends('layouts.sidebar')
@section('contenido')
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">
                Habitaciones
            </h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li aria-current="page" class="breadcrumb-item active">
                            Habitaciones
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Todas las Habitaciones
                <button class="btn float-right btn-outline-success btn-xl btn-rounded" data-toggle="modal" data-target="#create"><span class="fas fa-plus"> Nuevo</span></button>
            </h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="zero_config">
                    <thead>
                        <tr>
                            <th>
                                
                            </th>
                            <th>
                                Numero de Habitacion
                            </th>
                           <th>
                                Tipo de Habitacion
                            </th>
                            <th>
                                Precio (Bs)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lista as $datos)
                        <tr>
                            <td>
                                {{ $datos->id }}
                            </td>
                            <td>
                                {{ $datos->nhab }}
                            </td>
                           <td>
                                {{ $datos->tipoh }}
                            </td>
                            <td>
                                {{ $datos->precioh }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
@endsection
