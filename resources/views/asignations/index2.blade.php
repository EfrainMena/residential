@extends('asignations.tabs')
@section('rooms')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Estados de las habitaciones</h5>
                    <div class="row">
                        <!-- Column -->
                        @foreach ($rooms as $datos)
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card card-hover">
                                @if($datos->status == 'Libre')
                                    <a class="btn btn-success free" id="{{ $datos->id }}">
                                        <h1 class="font-light text-white"><i class="fas fa-child"></i></h1>

                                @elseif($datos->status == 'Ocupado')
                                    <a class="btn btn-danger ocuped" id="{{ $datos->id }}">
                                        <h1 class="font-light text-white"><i class="fas fa-bed"></i></h1>

                                @elseif($datos->status == 'Limpiar')
                                    <a class="btn btn-facebook clean" id="{{ $datos->id }}">
                                        <h1 class="font-light text-white"><i class="mdi mdi-bell-ring"></i></h1>

                                @elseif($datos->status == 'Limpiando')
                                    <a class="btn btn-cyan cleaning" id="{{ $datos->id }}">
                                        <h1 class="font-light text-white"><i class="mdi mdi-broom"></i></h1>

                                @else
                                    <a class="btn btn-orange maintenance" id="{{ $datos->id }}">
                                        <h1 class="font-light text-white"><i class="mdi mdi-alert"></i></h1>
                                @endif
                                        <h4 class="text-white">Nº Habitacion: {{ $datos->number }}</h4>
                                        <h6 class="text-white">Cattegoria: {{ $datos->category->name }}</h6>
                                    </a>
                            </div>
                        </div>
                        @endforeach
                        <!--endColumn-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection