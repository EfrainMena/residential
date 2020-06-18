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
                        Clientes
                        <a class="btn btn-outline-success float-right card-title" id="add_client"><i class="fas fa-plus"> Cliente</i></a>
                    </h5>
                </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%" id="client_table">
                            <thead>
                                <tr>
                                    <th>
                                        Documento
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Apellidos
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
                        @include('clients.modal')
                        @include('clients.obsModal')
                    </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
@section('clientsScript')
    <script>
        $(document).ready(function(){
            $('#client_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('clients.getdata') }}",
                "columns": [
                    {"data": "document"},
                    {"data": "name"},
                    {"data": "surnames"},
                    {"data": "nationality"},
                    {"data": "action", ordenable:false, searchable:false}
                ],
                "language": {
                    'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
                }
            });
            //abrir el modal
            $('#add_client').click(function(){
                $('#clientModal').modal('show');
                $('#client_form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Agregar');
                $('.modal-title').text('Nuevo Cliente');
                document.getElementById("modalHeader").style.background = "#28b779";
            });

            $('#client_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "{{ route('clients.postdata') }}",
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
                            $('#client_form')[0].reset();
                            $('#action').val('Crear');
                            $('.modal-title').text('Nuevo Cliente');
                            $('#button_action').val('insert');
                            document.getElementById("modalHeader").style.background = "#28b779";
                            $('#client_table').DataTable().ajax.reload();
                            toastr_success();
                        }
                    }
                })
            });
            $(document).on('click', '.edit', function(){
                var id = $(this).attr("id");
                $.ajax({
                    url: "{{ route('clients.fetchdata') }}",
                    method: "GET",
                    data:{id:id},
                    dataType: "json",
                    success:function(data)
                    {
                        $('#document').val(data.document);
                        $('#name').val(data.name);
                        $('#surnames').val(data.surnames);
                        $('#birthdate').val(data.birthdate);
                        $('#profession').val(data.profession);
                        $('#id').val(id);
                        $('#clientModal').modal('show');
                        $('#action').val('Modificar');
                        $('.modal-title').text('Editar Cliente');
                        $('#button_action').val('update');
                        document.getElementById('modalHeader').style.background = "#ffb848";
                    }
                })
            });
            $(document).on('click', '.delete', function(){
                var id = $(this).attr('id');
                Swal.fire({
                  title: 'Estas por borrar este cliente',
                  text: "Puedes revertir el cambio.",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Sí, Borrar esto!',
                  cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                        url:"{{ route('clients.deletedata') }}",
                        method:"GET",
                        data:{id:id},
                            success:function(data)
                            {
                                Swal.fire(
                                'Borrado!',
                                'Eliminacion exitosa.',
                                'success'
                                );
                                $('#client_table').DataTable().ajax.reload();
                            }
                        })
                    }
                });
            });

            $(document).on('click', '.add_obs', function(){
                var id = $(this).attr("id");
                $.ajax({
                    url: "{{ route('clients.fetchdataforobs') }}",
                    method: "GET",
                    data:{id:id},
                    dataType: "json",
                    success:function(data)
                    {
                        $('#form_output_obs').html('');
                        $('#nameObs').text(data.name);
                        $('#surnamesObs').text(data.surnames);
                        $('#client_id').val(id);
                        $('#obsModal').modal('show');
                        $('#action_obs').val('Agregar');
                        $('.modal-title').text('Nueva Observacion');
                        $('#button_action_obs').val('insert');
                        document.getElementById('modalHeaderState').style.background = "#da542e";
                        toastr_warning();
                    }
                })
            });
            $('#obs_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "{{ route('clients.postdataforobs') }}",
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
                            $('#form_output_obs').html(error_html);
                            toastr_error();
                        }
                        else //cuando no esxiste errores
                        {
                            $('#form_output_obs').html('');
                            $('#action_obs').val('Agregar');
                            $('.modal-title').text('Nueva Observacion');
                            $('#button_action_obs').val('insert');
                            $('#description').val('');
                            document.getElementById("modalHeaderState").style.background = "#da542e";
                            toastr_info();
                        }
                    }
                })
            });
        });
    </script>
    <script>
        //listas dependientes
        $(document).ready(function(){
            $('#countries_list').on('change', function(){
                var country_id = $(this).val();
                if($.trim(country_id) != ''){
                    $.get('departaments', {country_id: country_id}, function(departaments){ //get->ruta; varDeRequest:VarArriba
                        $('#origin_departament').empty();//limpia el campo de anteriores resultados
                        $('#origin_departament').append("<option value=''> Selecciona un departamento</option>");
                        $.each(departaments, function(index, value){ //dos parametros que se reciben
                            $('#origin_departament').append("<option value='"+value+"'>"+ value+"</option>");
                        });
                    });
                    $.get('country', {country_id: country_id}, function(countries){ //get->ruta; varDeRquest:VarArriba
                        $('#origin_country').empty();
                        $.each(countries, function(id, name){
                            $('#origin_country').val(name);//se toma el campo y se le agrega valor Pais
                        });
                    });
                }
            });   
        });
    </script>
@endsection
