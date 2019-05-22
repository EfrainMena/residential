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
                Roles
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
                            Roles
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
                
               @can('roles.create')
                <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary pull-right">
                Crear
                </a>
                @endcan
                           </h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="zero_config">
                    <thead>
                        <tr>
                            <th width="10px">
                                ID
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Slug
                            </th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>
                                {{ $role->id }}
                            </td>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td>
                                {{ $role->slug }}
                            </td>

                            <td>
                                @can('roles.show')
                                <a href="{{ route('roles.show', $role->id)}}" 
                                class="btn btn-sm btn-default">
                                    Ver
                                </a>
                                @endcan
                            </td>

                            <td>
                                @can('roles.edit')
                                <a href="{{ route('roles.edit', $role->id)}}" 
                                class="btn btn-sm btn-default">
                                    Editar
                                </a>
                                @endcan
                            </td>
                            <td>
                                @can('roles.destroy')
                                    {!! Form::open (['route' => ['roles.destroy', $role->id],
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
                
            </div>
        </div>
    </div>
</div>
@endsection
