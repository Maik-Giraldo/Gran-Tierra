@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Permisos</h1>
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
        @if($user->role_id == '1')
        <h2 class="lte-hide-title">Roles y permisos para el usuario {{$user->Nit}}</h2>
        @if(Session::has('flash_message'))
        <div class="alert alert-success">
           <button type="button" aria-hidden="true" class="close">
               <i class="now-ui-icons ui-1_simple-remove"></i>
           </button>
           <span><b> Excelente! - </b> {!! session('flash_message') !!}</span>
       </div>
       @endif
       <?php Session::forget('flash_message');?>
        <div class="row">
	         <div class="col-sm-4">
		           <div class="panel panel-default">
			              <div class="panel-heading">
				                  <strong><span class="glyphicon glyphicon-th"></span>Roles</strong>
	                 </div>
	                <div class="panel-body">
                    <form action="{{url('usuarios/update/permissions')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_user" value="{{$user->id}}">
                    <label><input type="checkbox"  name="roles" value="administrador">Administrador</label>
										<br/>
			              <br/>
                    <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
				              </form>
			             </div>
		               </div>
	                </div>
	<div class="col-sm-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>
					<span class="glyphicon glyphicon-th"></span> Permisos	</strong>
			</div>
			<div class="panel-body">
				<div class="row">
						<div class="col-sm-6">
							<fieldset>
								<legend>User common permission</legend>
								<ul>
                  <li>Change own password</li>
								</ul>
							</fieldset>
							<br/>
						</div>
						<div class="col-sm-6">
							<fieldset>
								<legend>Proveedor Management</legend>
								<ul>
                  <li>Edit Proveedor</li>
									<li>View Proveedor</li>
					      </ul>
							</fieldset>
							<br/>
						</div>
						<div class="col-sm-6">
							<fieldset>
								<legend>User management</legend>
								<ul>
							  <li>Edit users</li>
								<li>View users</li>
								</ul>
							</fieldset>
							<br/>
						</div>
						<div class="col-sm-6">
							<fieldset>
								<legend>ICA Management</legend>
								<ul>
									<li>Export ICA</li>
								  <li>View ICA</li>
								</ul>
							</fieldset>
							<br/>
						</div>
						<div class="col-sm-6">
							<fieldset>
								<legend>IVA Management</legend>
								<ul>
            				<li>Export IVA</li>
								</ul>
							</fieldset>
							<br/>
						</div>
						<div class="col-sm-6">
							<fieldset>
								<legend>RTF Management</legend>

								<ul>
																			<li>
											Export RTF
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>Site management</legend>

								<ul>
																			<li>
											View Contact
																					</li>
																			<li>
											View home
																					</li>
																			<li>
											View Normatividad
																					</li>
																			<li>
											View Políticas
																					</li>
																			<li>
											View Soporte
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>Facturas Management</legend>

								<ul>
																			<li>
											View Facturas
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>Noticias Management</legend>

								<ul>
																			<li>
											View Noticias
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>Notificaciones Management</legend>

								<ul>
																			<li>
											View Notificaciones
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


				</div>

			</div>
		</div>
	</div>
</div>

        @else
<h2 class="lte-hide-title">Roles y permisos para el usuario {{$user->Nit}}</h2>
@if(Session::has('flash_message'))
<div class="alert alert-success">
   <button type="button" aria-hidden="true" class="close">
       <i class="now-ui-icons ui-1_simple-remove"></i>
   </button>
   <span><b> Excelente! - </b> {!! session('flash_message') !!}</span>
</div>
@endif
<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>
					<span class="glyphicon glyphicon-th"></span> Roles				</strong>
			</div>
			<div class="panel-body">
				<form action="{{url('usuarios/update/permissions')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id_user" value="{{$user->id}}"
									<label>	<input type="checkbox" checked name="roles" value="administrador">
						              Administrador
        					</label><br/><br/>
					<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
				</form>
      </div>
		</div>
	</div>

	<div class="col-sm-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>
					<span class="glyphicon glyphicon-th"></span> Permisos				</strong>
			</div>
			<div class="panel-body">

				<div class="row">

						<div class="col-sm-6">
							<fieldset>
								<legend>User management</legend>

								<ul>
																			<li>
											Assign roles to users
																					</li>
																			<li>
											Bind user to IP
																					</li>
																			<li>
											Change user password
																					</li>
																			<li>
											Create users
																					</li>
																			<li>
											Delete users
																					</li>
																			<li>
											Edit user email
																					</li>
																			<li>
											Edit users
																					</li>
																			<li>
											Export Users
																					</li>
																			<li>
											Ver roles admin
																					</li>
																			<li>
											View registration IP
																					</li>
																			<li>
											View user email
																					</li>
																			<li>
											View user roles
																					</li>
																			<li>
											View users
																					</li>
																			<li>
											View visit log
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>User common permission</legend>

								<ul>
																			<li>
											Change own password
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>Facturas Management</legend>

								<ul>
																			<li>
											Create Facturas
																					</li>
																			<li>
											Delete Facturas
																					</li>
																			<li>
											Edit Facturas
																					</li>
																			<li>
											Import Facturas
																					</li>
																			<li>
											Massive Delete Facturas
																					</li>
																			<li>
											View Facturas
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>ICA Management</legend>

								<ul>
																			<li>
											Create ICA
																					</li>
																			<li>
											Delete ICA
																					</li>
																			<li>
											Edit ICA
																					</li>
																			<li>
											Export ICA
																					</li>
																			<li>
											Import ICA
																					</li>
																			<li>
											Massive Delete ICA
																					</li>
																			<li>
											View ICA
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>IVA Management</legend>

								<ul>
																			<li>
											Create IVA
																					</li>
																			<li>
											Delete IVA
																					</li>
																			<li>
											Edit IVA
																					</li>
																			<li>
											Export IVA
																					</li>
																			<li>
											Import IVA
																					</li>
																			<li>
											Massive Delete IVA
																					</li>
																			<li>
											View IVA
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>Noticias Management</legend>

								<ul>
																			<li>
											Create Noticias
																					</li>
																			<li>
											Delete Noticias
																					</li>
																			<li>
											Edit Noticias
																					</li>
																			<li>
											View Noticias
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>Notificaciones Management</legend>

								<ul>
																			<li>
											Create Notificaciones
																					</li>
																			<li>
											Delete Notificaciones
																					</li>
																			<li>
											Edit Notificaciones
																					</li>
																			<li>
											View Notificaciones
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>Proveedor Management</legend>

								<ul>
																			<li>
											Create Proveedor
																					</li>
																			<li>
											Delete Proveedor
																					</li>
																			<li>
											Edit Proveedor
																					</li>
																			<li>
											Index Proveedor
																					</li>
																			<li>
											Update Status Proveedor
																					</li>
																			<li>
											View Proveedor
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>RTF Management</legend>

								<ul>
																			<li>
											Create RTF
																					</li>
																			<li>
											Delete RTF
																					</li>
																			<li>
											Edit RTF
																					</li>
																			<li>
											Export RTF
																					</li>
																			<li>
											Import RTF
																					</li>
																			<li>
											Massive Delete RTF
																					</li>
																			<li>
											View RTF
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>Empresa Management</legend>

								<ul>
																			<li>
											Update empresa
																					</li>
																			<li>
											View empresa
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


						<div class="col-sm-6">
							<fieldset>
								<legend>Site management</legend>

								<ul>
																			<li>
											View Contact
																					</li>
																			<li>
											View home
																					</li>
																			<li>
											View Normatividad
																					</li>
																			<li>
											View Políticas
																					</li>
																			<li>
											View Soporte
																					</li>
																	</ul>
							</fieldset>

							<br/>
						</div>


				</div>

			</div>
		</div>
	</div>
</div>
        @endif
        @endforeach
        </div>
      </div>
    </div>
@stop
