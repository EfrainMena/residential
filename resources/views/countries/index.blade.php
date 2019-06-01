@extends('layouts.sidebar')
@section('contenido')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">
                Inicio
            </h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Inicio
                            </a>
                        </li>
                        <li aria-current="page" class="breadcrumb-item active">

                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Usuarios
                <a class="btn btn-outline-success float-right card-title" id="add_data">Nuevo</a>
            </h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="user_table">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Pais
                            </th>
                            <th>
                                Nacionalidad
                            </th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                </table>
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('countriesScript')
    <script></script>
@endsection
