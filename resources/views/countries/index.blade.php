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
                Paises
                <a class="btn btn-outline-success float-right card-title" id="add_country">Nuevo</a>
            </h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="country_table">
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
                @include('countries.modal')
                @include('countries.addStateModal')
            </div>
        </div>
    </div>
</div>
@endsection
@section('countriesScript')
    <script>
        $(document).ready(function(){
            $('#country_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('getdata.countries') }}",
                "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "nationality"},
                    {"data": "action", ordenable:false, searchable:false}
                ],
                "language": {
                    'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
                }
            });
            $('#add_country').click(function(){
                $('#countryModal').modal('show');
                $('#country_form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Crear');
                $('.modal-title').text('Nuevo Pais');
                document.getElementById("modalHeader").style.background = "#28b779";
            });

            $('#country_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "{{ route('postdata.countries') }}",
                    method: "POST",
                    data: form_data,
                    dataType: "json",
                    success:function(data)
                    {
                        if(data.error.length > 0)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<ul class="alert alert-danger"><li>'+data.error[count]+'</li></ul>';
                            }
                            $('#form_output').html(error_html);
                            toastr_error();
                        }
                        else
                        {
                            $('#form_output').html('');
                            $('#country_form')[0].reset();
                            $('#action').val('Crear');
                            $('.modal-title').text('Nuevo Pais');
                            $('#button_action').val('insert');
                            document.getElementById("modalHeader").style.background = "#28b779";
                            $('#country_table').DataTable().ajax.reload();
                            toastr_success();
                        }
                    }
                })
            });
            $(document).on('click', '.edit', function(){
                var id = $(this).attr("id");
                $.ajax({
                    url: "{{ route('fetchdata.countries') }}",
                    method: "GET",
                    data:{id:id},
                    dataType: "json",
                    success:function(data)
                    {
                        $('#name').val(data.name);
                        $('#nationality').val(data.nationality);
                        $('#id').val(id);
                        $('#countryModal').modal('show');
                        $('#action').val('Modificar');
                        $('.modal-title').text('Editar Pais');
                        $('#button_action').val('update');
                        document.getElementById('modalHeader').style.background = "#ffb848";
                    }
                })
            });
            $(document).on('click', '.add_state', function(){
                var id = $(this).attr("id");
                $.ajax({
                    url: "{{ route('fetchdataforstate.state') }}",
                    method: "GET",
                    data:{id:id},
                    dataType: "json",
                    success:function(data)
                    {
                        $('#country').val(data.name);
                        $('#country_id').val(id);
                        $('#stateModal').modal('show');
                        $('#action_state').val('Agregar');
                        $('.modal-title').text('Nuevo Departamento');
                        $('#button_action_state').val('insert');
                        document.getElementById('modalHeader').style.background = "#ffb848";
                    }
                })
            });
            $('#state_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "{{ route('postdataforstate.state') }}",
                    method: "POST",
                    data: form_data,
                    dataType: "json",
                    success:function(data)
                    {
                        if(data.error.length > 0)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<ul class="alert alert-danger"><li>'+data.error[count]+'</li></ul>';
                            }
                            $('#form_output').html(error_html);
                            toastr_error();
                        }
                        else
                        {
                            $('#form_output').html('');
                            $('#state_form')[0].reset();
                            $('#action_state').val('Agregar');
                            $('.modal-title').text('Nuevo Departamento');
                            $('#button_action').val('insert');
                            document.getElementById("modalHeader").style.background = "#28b779";
                            $('#country_table').DataTable().ajax.reload();
                            toastr_success();
                        }
                    }
                })
            });
        });
    </script>
@endsection
