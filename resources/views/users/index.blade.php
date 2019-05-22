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
            <h5 class="card-title">
                
                
            </h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="zero_config">
                    <thead>
                        <tr>
                            <th >
                                ID
                            </th>
                            <th>
                                Nick
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Correo Electronico
                            </th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->username }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>

                            <td width="10px">
                                @can('users.show')
                                <a href="{{ route('users.show', $user->id)}}" 
                                class="btn btn-sm btn-default">
                                    Ver
                                </a>
                                @endcan
                            </td>

                            <td width="10px">
                                @can('users.edit')
                                <a href="{{ route('users.edit', $user->id)}}" 
                                class="btn btn-sm btn-default">
                                    Editar
                                </a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('users.destroy')
                                    {!! Form::open (['route' => ['users.destroy', $user->id],
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                                {{ $users->render()}}
            </div>
        </div>
    </div>
</div>
@endsection
