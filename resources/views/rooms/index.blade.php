@extends('layouts.sidebar')
@section('contenido')
<div class="page-breadcrumb">
    <div class="row">

        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">
                Categorias
            </h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorías</button>
                        <div class="dropdown-menu alert-dark" >
                          <a class="btn dropdown-item" id="add_category">Nueva categoría</a>
                          <a class="btn dropdown-item" href="#">Ver categorías</a>
                          <a class="btn dropdown-item" href="#">Editar categoría</a>
                        </div>
                    </div>
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
                        Habitaciones
                        <a class="btn btn-outline-success float-right card-title" id="add_room"><i class="fas fa-plus"> Habitación</i></a>
                    </h5>
                </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%" id="room_table">
                            <thead>
                                <tr>
                                    <th>
                                        Nº Habitacion
                                    </th>
                                    <th>
                                        Nº Piso
                                    </th>
                                    <th>
                                        Caracteristicas
                                    </th>
                                    <th>
                                        Precio regular (Bs.)
                                    </th>
                                    <th>
                                        Precio Fin Semana (Bs.)
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        @include('rooms.modal')
                        @include('rooms.categoryModal')
                    </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
@section('roomsScript')
    <script>
        $(document).ready(function(){
            $('#room_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('rooms.getdata') }}",
                "columns": [
                    {"data": "number"},
                    {"data": "level"},
                    {"data": "category.characteristics"},
                    {"data": "category.regular_price"},
                    {"data": "category.weekend_price"},
                    {"data": "action", ordenable:false, searchable:false}
                ],
                "language": {
                    'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
                }
            });
            //abrir el modal
            $('#add_room').click(function(){
                $('#roomModal').modal('show');
                $('#room_form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Agregar');
                $('.modal-title').text('Nueva Habitación');
                document.getElementById("modalHeader").style.background = "#28b779";
            });

            $('#room_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "{{ route('rooms.postdata') }}",
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
                            $('#room_form')[0].reset();
                            $('#action').val('Crear');
                            $('.modal-title').text('Nueva Habitación');
                            $('#button_action').val('insert');
                            document.getElementById("modalHeader").style.background = "#28b779";
                            $('#room_table').DataTable().ajax.reload();
                            toastr_success();
                        }
                    }
                })
            });

            $('#add_category').click(function(){
                $('#categoryModal').modal('show');
                $('#category_form')[0].reset();
                $('#form_output_cat').html('');
                $('#button_action_cat').val('insert');
                $('#action_cat').val('Agregar');
                $('.modal-title').text('Nueva categoría');
                document.getElementById("modalHeaderCategory").style.background = "#28b779";
            });
            $('#category_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "{{ route('categories.postdata') }}",
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
                            $('#form_output_cat').html(error_html);
                            toastr_error();
                        }
                        else //cuando no esxiste errores
                        {
                            $('#form_output_cat').html('');
                            $('#category_form')[0].reset();
                            $('#action_cat').val('Agregar');
                            $('.modal-title').text('Nueva Categoría');
                            $('#button_action_cat').val('insert');
                            document.getElementById("modalHeaderCategory").style.background = "#28b779";
                            toastr_success();
                        }
                    }
                })
            });

            // borrar pais
            $(document).on('click', '.delete', function(){
                var id = $(this).attr('id');
                Swal.fire({
                  title: 'Estas por borrar esta Habitacion',
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
                        url:"{{ route('rooms.deletedata') }}",
                        method:"GET",
                        data:{id:id},
                            success:function(data)
                            {
                                Swal.fire(
                                'Borrado!',
                                'Eliminacion exitosa.',
                                'success'
                                );
                                $('#room_table').DataTable().ajax.reload();
                            }
                        })
                    }
                });
            });




        });
    </script>
@endsection
