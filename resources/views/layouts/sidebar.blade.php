<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('index/assets/images/favicon.png') }}">
    <title>Administrador</title>
    <!-- Custom CSS -->
    <link href="{{ asset('index/dist/css/style.min.css') }}" rel="stylesheet">
    <!--tables-->
    <link rel="stylesheet" href="{{ asset('index/DataTables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <!--Autocomplete - Style - Themes-->
    <link rel="stylesheet" href="{{ asset('index/EasyAutocomplete/easy-autocomplete.min.css') }}">
    <link rel="stylesheet" href="{{ asset('index/EasyAutocomplete/easy-autocomplete.themes.min.css') }}">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!--<div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>-->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
    @include('layouts.navbar')
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        @can('users.index')
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('users.index')}}" aria-expanded="false"><i class="fas fa-user-circle"></i><span class="hide-menu">Usuarios</span></a></li>
                        @endcan

                        @can('roles.index')
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('roles.index')}}" aria-expanded="false"><i class="fas fa-file-alt"></i><span class="hide-menu"> Roles</span></a></li>
                        @endcan
                       
                       @can('countries.index')
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('countries.index') }}" aria-expanded="false"><i class="fas fa-location-arrow"></i><span class="hide-menu"> Localidades</span></a></li>
                       @endcan

                        @can('clients.index')
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('clients.index') }}" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu"> Clientes</span></a></li>
                        @endcan

                        @can('rooms.index')
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('rooms.index') }}" aria-expanded="false"><i class="fas fa-bed"></i><span class="hide-menu"> Habitaciones</span></a></li>
                        @endcan

                        @can('asignations.index')
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('asignations.index') }}" aria-expanded="false"><i class="fas fa-building"></i><span class="hide-menu"> Asignaciones</span></a></li>
                        @endcan

                        @can('asignations.indexH')
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('asignations.indexH')}}" aria-expanded="false"><i class="fas fa-file-alt"></i><span class="hide-menu"> Lista de Huespedes</span></a></li>
                        @endcan
                        
                        
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            @yield('contenido')
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                ResidentialAplication - Project made by The HellFish Team. All Rights Reserved.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="index/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="index/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="index/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="index/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="index/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="index/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="index/dist/js/custom.min.js"></script>
    <!--DataTables JavaScript-->
    <script src="index/DataTables/datatables.min.js"></script>
    <script src="index/DataTables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <!--EasyAutocomplete - js-->
    <script src="index/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
    @yield('countriesScript')
    @yield('clientsScript')
    @yield('roomsScript')
    @yield('asignationsScript')
    <!--SweetAlerts en vista-->
    @include('sweetalert::alert')
    <!--Alertas toastr-->
    <script>
        //Mostrar ToastrError
        function toastr_error()
        {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                type: 'error',
                //title: 'Revisa el formulario',
                title: 'Algo salió mal'
            });
        return toastr_error;
        }
        //Mostrar ToastrSuccess
        function toastr_success() 
        {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });

            Toast.fire({
            type: 'success',
            title: '¡Operación Exitosa!'
            });
        return toastr_success;
        }
        function toastr_info() 
        {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });

            Toast.fire({
            type: 'info',
            title: 'Operación ejecutada'
            });
        return toastr_info;
        }
        function toastr_warning() 
        {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
            });

            Toast.fire({
            type: 'warning',
            title: 'Acción importante'
            });
        return toastr_warning;
        }
        function toastr_question() 
        {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });

            Toast.fire({
            type: 'question',
            title: '¿Estás segur@?'
            });
        return toastr_question;
        }
    </script>
    <script>
        function baseUrl(url) {
            return '{{ url('') }}/' + url;
        }
    </script>
</body>
</html>