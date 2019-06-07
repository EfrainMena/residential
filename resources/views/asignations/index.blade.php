@extends('layouts.sidebar')
@section('contenido')
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
       
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Elements</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
                 <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Icon Box</h5>
                                <div class="row">
                                    <!-- Column -->
                                    @foreach ($lista as $datos)
                                        
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover" data-toggle="modal" data-target="#roomModal" id="habitacion">
                                          @if($datos->status == 'libre')  
                                            
                                            <a class="btn btn-success">
                                          @elseif($datos->status == 'ocupado')  
                                          <a class="btn btn-danger">
                                          @else
                                          <a class="btn btn-warning">
                                          @endif
                                            
                                                <h1 class="font-light text-white"><i class="mdi mdi-home-outline"></i></h1>
                                                <h6 class="text-white">{{ $datos->name }}</h6>
                                                <h6 class="text-white-50">Estado: {{ $datos->status }}</h6>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--endColumn-->
                                </div>
                                @include('layouts.habitaciones.modalRoom')
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    

@endsection