@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Usuarios</h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
    <li class="active">Usuarios</li>
    </ul>
@stop

@section('content')
  <div class="user-index">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-6">
            <p>
              <a class="btn btn-success" href="{{url('usuarios/create/form')}}"><span class="glyphicon glyphicon-plus-sign"></span> Crear</a>					</p>
            </div>
            <div class="col-sm-6 text-right">
              <div class="form-inline pull-right">
                <span style="display: none" id="user-grid-clear-filters-btn" class="btn btn-sm btn-default">
                  Limpiar filtros		</span>
                  Registros por pagina
                  <select class="form-control input-sm" name="grid-page-size" id="grid-page-size">
                    <option value="{{url('usuarios/'.$usuarios->perpage())}}" selected>{{$usuarios->perpage()}}</option>
                    <option value="{{url('usuarios/5')}}">5</option>
                    <option value="{{url('usuarios/10')}}">10</option>
                    <option value="{{url('usuarios/20')}}">20</option>
                    <option value="{{url('usuarios/50')}}">50</option>
                    <option value="{{url('usuarios/100')}}">100</option>
                    <option value="{{url('usuarios/200')}}">200</option>
                  </select>
                </div>
      				</div>
            </div>
            <div id="user-grid-pjax" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
              <div id="user-grid" class="grid-view"><table class="table table-striped table-bordered">
                <colgroup><col style="width:10px">
                <col>
                <col>
                <col>
                <col>
                <col width="10px">
                <col width="10px">
                <col>
                <col style="width:10px">
                <col>
              </colgroup>
              <thead>
                <tr>
                  <th>#</th>
                  <th><a href="#">Nit</a></th>
                  <th><a href="#" >Correo electrónico</a></th>
                  <th><a href="#" >Correo confirmado</a></th>
                  <th>Roles</th>
                  <th></th>
                  <th></th>
                  <th><a href="#">Estado</a></th>
                  <th><input type="checkbox" class="select-on-check-all" id="selection_all" name="selection_all" value="1"></th>
                  <th class="action-column">&nbsp;</th>
                </tr>
                <tr id="user-grid-filters" class="filters">
                  <form role="search" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('usuarios/search/list')}}" method="GET">
                  <td>&nbsp;</td>
                  <td><input type="text" class="form-control" name="nit"></td>
                  <td><input type="text" class="form-control" name="email"></td>
                  <td><select class="form-control" id="email_confirmed">
                    <option value=""></option>
                    <option value="{{url('usuarios/email-confirmado/0/20')}}">No</option>
                    <option value="{{url('usuarios/email-confirmado/1/20')}}">Sí</option>
                  </select>
                  </td>
                  <td>
                      <select class="form-control" name="gridRoleSearch" id="gridRoleSearch">
                        <option value="{{url('usuarios/'.$usersf.'/20')}}" selected>@if ($usersf === 'administradores') Administrador @elseif ($usersf === 'proveedores') Proveedor @else Todos @endif</option>
                        <option value="{{url('usuarios/administradores-list/20')}}">Administrador</option>
                        <option value="{{url('usuarios/proveedores-list/20')}}">Proveedor</option>
                      </select></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>
                    <select class="form-control" id="status">
                    <option value=""></option>
                    <option value="{{url('usuarios/estado/1/20')}}">Activo</option>
                    <option value="{{url('usuarios/estado/0/20')}}">Inactivo</option>
                    </select>
                  </td>
                  <td>&nbsp;</td>
                  <td><button type="submit" class="btn btn-primary" title="Buscar" alt="Buscar">
                    <i class="fa fa-fw fa-search"></i></button></td>
                </form>
                </tr>
                </thead>
                <tbody>
                  @foreach($usuarios as $usuario)
                  <tr>
                  <form name="acciones" id="acciones" class="navbar-form navbar-left" accept-charset="UTF-8" action="{{url('usuarios/update/selections')}}" method="POST">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <td>{{$usuario->id}}</td>
                    <td><a href="{{url('usuarios/view/id='.$usuario->id)}}">{{$usuario->Nit}}</a></td>
                    <td>{{$usuario->email}}</td>
                    <td style="text-align:center; width:80px; white-space:nowrap;">
                      @if ($usuario->email_confirmed == '1')
                      <span style='font-size:85%;'  class='label label-success'>Si</span>
                       @else <span style='font-size:85%;'  class='label label-warning'>No</span> @endif
                    </td>
                    <td>@if ($usuario->role_id == '4')Administrador @else Proveedor @endif</td>
                    <td><a class="btn btn-sm btn-primary" href="{{url('usuarios/permisos/id='.$usuario->id)}}">Roles y permisos</a></td>
                    <td><a class="btn btn-sm btn-default" href="{{url('usuarios/edit/id='.$usuario->id)}}" data-pjax="0">Cambiar contraseña de usuario</a></td>
                    <td style="text-align:center; width:80px; white-space:nowrap;">
                      @if ($usuario->activo == '1')
                      <span style='font-size:85%;' class='label label-success'>Activo</span>
                      @else
                      <span style='font-size:85%;' class="label label-warning">Inactivo</span>
                      @endif
                    </td>
                    <td><input type="checkbox" id="itemcheck" class="checksavon" name="{{$usuario->id}}" value="{{$usuario->id}}"></td>
                    <td style="width:70px; text-align:center;"><a href="{{url('usuarios/view/id='.$usuario->id)}}" title="Ver" aria-label="Ver">
                      <span class="glyphicon glyphicon-eye-open"></span></a>
                     <a href="{{url('usuarios/edit/id='.$usuario->id)}}" title="Actualizar" aria-label="Actualizar" data-pjax="0">
                       <span class="glyphicon glyphicon-pencil"></span></a>
                     <a href="#" id="borraritem" name="{{$usuario->id}}" title="users" aria-label="Eliminar">
                       <span class="glyphicon glyphicon-trash"></span></a></td>
                    </form>
                     </tr>
                    @endforeach
                      </tbody>
                    </table>
                {{$usuarios->links()}}
                <div class="textdiv">

                </div>
                    <div class="row">
                      <div class="col-sm-8"></div>
                      <div class="col-sm-4 text-right">
                        <div class="summary">
                          <strong>Mostrando {{($usuarios->currentpage()-1)*$usuarios->perpage()+1}}-{{$usuarios->currentpage()*$usuarios->perpage()}}</strong>
                            de  <strong>{{$usuarios->total()}}</strong> elementos
                          </div>
                        <div class="form-inline">
                          <select id="user-grid-5bdc3c6444915-bulk-actions" class="form-control input-sm" name="grid-bulk-actions" data-ok-button="#user-grid-5bdc3c6444915-ok-button">
                            <option value="" selected>--- Con lo seleccionado ---</option>
                            <option value="activar">Activo</option>
                            <option value="desactivar">Desactivar</option>
                            <optgroup label="----">
                              <option value="eliminar">Eliminar</option>
                            </optgroup>
                          </select>
                          <span id="user-grid-ok-button" class="grid-bulk-ok-button btn btn-sm btn-default" data-list="#user-grid-5bdc3c6444915-bulk-actions">OK</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@stop
