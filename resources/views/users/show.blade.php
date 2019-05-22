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
                Usuarios
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
                            Usuario
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
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="zero_config">


                <div class="card-header">Usuario</div>

                <div class="card-body">
                <p><strong>Nick</strong> {{ $user->username }}</p>
                <p><strong>Nombre</strong> {{ $user->name }}</p>
                <p><strong>Correo electronico</strong> {{ $user->email }}</p>
                </div>



                </table>
                    
            </div>
        </div>
    </div>
</div>
@endsection
