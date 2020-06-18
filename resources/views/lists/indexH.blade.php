

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">
                        LISTA DE HUESPEDES RESIDENCIAL "SAN BENEDIC ESMERALDA"
                        
                        
                    </h5>
                    <style>
                        td, th{
                            border: 1px solid #dddddd;
                        } 
                    </style>
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
    
