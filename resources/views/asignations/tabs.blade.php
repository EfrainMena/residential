@extends('layouts.sidebar')
@section('contenido')
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <nav class="nav nav-pills" id="sidebarnav">
                <a class="nav-link {{ request()->is('roomslist') ? 'active' : '' }}" href="{{ route('asignations.index') }}">Planta Baja</a>
                <a class="nav-link {{ request()->is('roomslist1') ? 'active' : '' }}" href="{{ route('asignations.index1') }}">Nivel 1</a>
                <a class="nav-link {{ request()->is('roomslist2') ? 'active' : '' }}" href="{{ route('asignations.index2') }}">Nivel 2</a>
                <a class="nav-link {{ request()->is('roomslist3') ? 'active' : '' }}" href="{{ route('asignations.index3') }}">Nivel 3</a>
            </nav>
        </div>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->
<!-- Container fluid  -->
@yield('rooms')
<!-- End Cointainer fluid  -->
@include('asignations.freeModal')
@include('asignations.ocupedModal')
@endsection
@section('asignationsScript')
    <script>
        //habitacion libre
        $(document).ready(function(){

            $('.free').click(function(){
                var room_id = $(this).attr("id");
                $('#freeModal').modal('show');
                $('#free_form')[0].reset();
                $('#form_output_free').html('');
                $('#button_action_free').val('insert');
                $('#action_free').val('Registrar');
                $('#room_id').val(room_id);
                $('.modal-title').text('Asignación');
                $('.to-maintenance').attr({id: room_id});
                document.getElementById("modalHeaderFree").style.background = "#28b779";
            });

            $('#free_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "{{ route('asignations.postdata') }}",
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
                            $('#form_output_free').html('');
                            $('#free_form')[0].reset();
                            $('#action_free').val('Registrar');
                            $('.modal-title').text('Asignación');
                            $('#button_action_free').val('insert');
                            document.getElementById("modalHeaderFree").style.background = "#28b779";
                            $('#freeModal').on('hidden.bs.modal', function () { location.reload(); });
                            toastr_success();
                        }
                    }
                })
            });
















            $(document).on('click', '.to-maintenance', function(){
                var id = $(this).attr('id');
                Swal.fire({
                  title: '¿Quieres poner en mantenimiento esta habitación?',
                  text: "El cliente no lo podrá ocupar",
                  type: 'question',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: '¡Sí!',
                  cancelButtonText: 'Cancelar'
                }).then((result) => {
                  if (result.value) {
                    $.ajax({
                    url:"{{ route('rooms.maintenance') }}",
                    method:"GET",
                    data:{id:id},
                        success:function(data)
                        {
                            toastr_info();
                            $('#freeModal').on('hidden.bs.modal', function () { location.reload(); });
                        }
                    })
                  }
                });
            });

            $(document).on('click', '.ocuped', function(){
                var room_id = $(this).attr("id");
                $.ajax({
                    url: "{{ route('asignations.ocuped') }}",
                    method: "GET",
                    data:{room_id:room_id},
                    dataType: "json",
                    success:function(data)
                    {
                        $('#document').text(data.document);
                        $('#name').text(data.name);
                        $('#surnames').text(data.surnames);
                        $('#origin_country').text(data.origin_country);
                        $('#origin_departament').text(data.origin_departament);
                        $('#nationality').text(data.nationality);
                        $('#civil_state').text(data.civil_state);
                        $('#profession').text(data.profession);
                        $('#client_id_ocuped').val(data.id);
                        $('#room_id_ocuped').val(room_id);
                        $('#ocupedModal').modal('show');
                        $('#action_ocuped').val('Finalizar');
                        $('.modal-title').text('Ver Huésped');
                        //$('#button_action').val('update');
                        document.getElementById('modalHeaderOcuped').style.background = "#da542e";
                    }
                })
            });


            $('#ocuped_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                Swal.fire({
                  title: 'Quieres desocupar esta habitación',
                  text: "Los datos del clientes no se verán aqui",
                  type: 'question',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Sí, Desocupar!',
                  cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ route('asignations.postdataocuped') }}",
                            method: "POST",
                            data: form_data,
                            dataType: "json",
                            success:function(data)
                            {
                                $('#ocuped_form')[0].reset();
                                document.getElementById("modalHeaderOcuped").style.background = "#28b779";
                                $('#ocupedModal').on('hidden.bs.modal', function () { location.reload(); });
                                toastr_info();
                            }
                        })
                    }
                });
            });


            $(document).on('click', '.cleaning', function(){
                var id = $(this).attr('id');
                Swal.fire({
                    title: 'Esta habitación se encuentra en Limpieza',
                    text: "¿Quieres finalizarlo?",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Finalizar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url:"{{ route('rooms.finishMaint') }}",
                            method:"GET",
                            data:{id:id},
                            success:function(data)
                            {
                                location.reload();
                            }
                        })
                    }
                });
            });
            $(document).on('click', '.clean', function(){
                var id = $(this).attr('id');
                Swal.fire({
                    title: 'Esta habitacion necesita limpieza',
                    text: "¿Desea limpiarlo?",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Finalizar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url:"{{ route('rooms.limpiando') }}",
                            method:"GET",
                            data:{id:id},
                            success:function(data)
                            {
                                location.reload();
                            }
                        })
                    }
                });
            });

            $(document).on('click', '.maintenance', function(){
                var id = $(this).attr('id');
                Swal.fire({
                  title: 'Esta habitación se encuentra en mantenimiento',
                  text: "¿Quieres finalizarlo?",
                  type: 'question',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Finalizar',
                  cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                        url:"{{ route('rooms.finishMaint') }}",
                        method:"GET",
                        data:{id:id},
                            success:function(data)
                            {
                                location.reload();
                            }
                        })
                    }
                });
            });
        })
    </script>
    <script>
        $(document).ready(function(){
            autocomprelte();
        })
        function autocomprelte(){
            var options = {
                url: function(q){
                    return baseUrl('Client/findClient?q=' +q);
                },
                getValue: function(element) {
                    return element.document;
                },
                list: {
                    maxNumberOfElements: 6,
                    onClickEvent: function(){
                        var e = $("#code").getSelectedItemData();

                        $("#firstname").val(e.name).trigger("change");
                        $("#secondname").val(e.surnames).trigger("change");
                        $("#client_id").val(e.id).trigger("change");
                    },
                }//,
                //theme: "plate-dark"
            };
            $("#code").easyAutocomplete(options);
            $(".easy-autocomplete").removeAttr("style");
        }
    </script>
@endsection