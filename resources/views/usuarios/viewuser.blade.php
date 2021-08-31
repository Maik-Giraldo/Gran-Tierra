@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Ver Usuario</h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
      <li><a href="{{url('usuarios')}}">Usuarios</a></li>
    <li class="active">Ver Usuario</li>
    </ul>
@stop

@section('content')
<div class="col-xs-12">
  <div class="box box-warning">
    <div class="ica-view box-body">
      @foreach ($datauser as $user)
      <p>
			<a class="btn btn-sm btn-primary" href="{{url('usuarios/edit/id='.$user->id)}}">Editar</a>
      <a class="btn btn-sm btn-default" href="{{url('usuarios/permisos/id='.$user->id)}}">Roles y permisos</a>
			<a class="btn btn-sm btn-danger pull-right" href="#" id="borrariteminside" name="{{$user->id}}" title="users">Eliminar</a>
	    </p>
      <table id="w0" class="table table-striped table-bordered detail-view">
        <tr><th>ID</th><td>{{$user->id}}</td></tr>
        <tr><th>Estado</th><td>@if($user->activo == 1) Activo @else Inactivo @endif</td></tr>
        <tr><th>Número de Identificación Tributaria</th><td>{{$user->Nit}}</td></tr>
        <tr><th>Tipo Persona</th><td>{{$user->tipo_persona}}</td></tr>
        <tr><th>Nombre o Razón Solcial</th><td>{{$user->name}}</td></tr>
        <tr><th>Email</th><td>{{$user->email}}</td></tr>
        <tr><th>Rol</th><td>@if($user->role_id == 4)Administrador @else Proveedor @endif</td></tr>
        <tr><th>País de Residencia Fiscal</th><td>{{$user->pais}}</td></tr>
        <tr><th>Ciudad</th><td>{{$user->Ciudad}}</td></tr>
        <tr><th>Teléfono</th><td>{{$user->Tel}}</td></tr>
        <tr><th>Contácto</th><td>{{$user->name}}</td></tr>
        <tr><th>Dirección</th><td>{{$user->Direccion}}</td></tr>
        <tr><th>Código Ciiu</th><td>{{$user->ciiu}}</td></tr>
        <tr><th>Creado</th><td>{{$user->created_at}}</td></tr>
        <tr><th>Actualizado</th><td>{{$user->updated_at}}</td></tr>
        </table>
        @endforeach
        </div>
      </div>
    </div>
@stop
