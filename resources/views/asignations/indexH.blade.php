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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">
                        Lista de Huespedes
                        
                    </h5>
                </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%" id="client_table">
                            <thead>
                                <tr>
                                    <th>
                                        Fecha
                                    </th>
                                    <th>
                                        Usuario
                                    </th>
                                    <th>
                                        C.I.
                                    </th>
                                    <th>
                                        Nombre Cliente
                                    </th>
                                    <th>
                                        Apellidos Cliente
                                    </th>
                                    <th>
                                        Fecha de Nacimiento
                                    </th>
                                    <th>
                                        Departamento
                                    </th>
                                    <th>
                                        Nacionalidad
                                    </th>
                                    <th>
                                        Habitacion
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($asignations as $asignation)
                            <tr>
                                <td>
                                    {{ $asignation->date }}
                                </td>
                                <td>
                                    {{ $asignation->user_name }}
                                </td>
                                <td>
                                    {{ $asignation->clients->document }}
                                </td>
                                <td>
                                    {{ $asignation->clients->name }}
                                </td>
                                <td>
                                    {{ $asignation->clients->surnames }}
                                </td>
                                <td>
                                    {{ $asignation->clients->birthdate }}
                                </td>
                                <td>
                                    {{ $asignation->clients->origin_departament }}
                                </td>
                                <td>
                                    {{ $asignation->clients->nationality }}
                                </td>
                                <td>
                                    {{ $asignation->room->number}}
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
@section('clientsScript')
    
@endsection
