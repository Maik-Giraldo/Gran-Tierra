@extends('adminlte::page')

@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Crear Usuario</h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
      <li><a href="{{url('usuarios')}}">Usuarios</a></li>
    <li class="active">Crear Usuario</li>
    </ul>
@stop

@section('content')
        <div class="box box-warning">
        <div class="seguimiento-facturas-index box-body">
        <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <form method="POST" action="{{url('createuseravon')}}" accept-charset="UTF-8" id="editprofile" name="editprofile"
        enctype="multipart/form-data">
        @if(Session::has('flash_message'))
        <div class="alert alert-success">
           <button type="button" aria-hidden="true" class="close">
               <i class="now-ui-icons ui-1_simple-remove"></i>
           </button>
           <span><b> Excelente! - </b> {!! session('flash_message') !!}</span>
       </div>
       @endif
       <?php Session::forget('flash_message');?>
       @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group{{ $errors->has('Empresa') ? ' has-error' : '' }}">
                      <label for="Empresa" class="col-md-4 control-label">Empresa*</label>
                      <div class="col-md-12">
                          <input id="Empresa" type="text" class="form-control" name="Empresa" required autofocus>
                          @if ($errors->has('Empresa'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('Empresa') }}</strong>
                              </span>
                          @endif
                      </div>
              </div>
                <div class="form-group">
                              <label for="Nit" class="col-md-4 control-label">Nit*</label>

                              <div class="col-md-12">
                                  <input id="Nit" type="text" class="form-control" name="Nit"  required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('Nit') }}</strong>
                                      </span>
                                  @endif
                              </div>
                  </div>
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name" class="col-md-4 control-label">Contacto*</label>

                      <div class="col-md-12">
                          <input id="name" type="text" class="form-control" name="name"  required autofocus>

                          @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tipo*</label>
                            <div class="col-md-12">
                            <select class="form-control" id="tipo_persona" name="tipo_persona" required>
                               <option value="">Seleccione...</option>
                               <option value="Proveedor">Proveedor</option>
                               <option value="Accionista">Accionista</option>
                               <option value="Cliente">Cliente</option>
                             </select>
                         </div>
                	</div>
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="col-md-4 control-label">Email*</label>

                      <div class="col-md-12">
                          <input id="email" type="email" class="form-control" name="email" required>
                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('Tel') ? ' has-error' : '' }}">
                      <label for="Tel" class="col-md-4 control-label">Tel??fono*</label>

                      <div class="col-md-12">
                          <input id="tel" type="text" class="form-control" name="Tel"  required autofocus>

                          @if ($errors->has('Tel'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('Tel') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('Ciudad') ? ' has-error' : '' }}">
                      <label for="Ciudad" class="col-md-4 control-label">Ciudad*</label>

                      <div class="col-md-12">
                          <input id="Ciudad" type="text" class="form-control" name="Ciudad" required autofocus>

                          @if ($errors->has('Ciudad'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('Ciudad') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('Direccion') ? ' has-error' : '' }}">
                      <label for="Direccion" class="col-md-4 control-label">Direcci??n*</label>

                      <div class="col-md-12">
                          <input id="Direccion" type="text" class="form-control" name="Direccion" required autofocus>

                          @if ($errors->has('Direccion'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('Direccion') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('ciiu') ? ' has-error' : '' }}">
                      <label for="ciiu" class="col-md-4 control-label">C??digo CIIU</label>

                      <div class="col-md-12">
                          <input id="ciiu" type="text" class="form-control" name="ciiu" autofocus>

                          @if ($errors->has('ciuu'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('ciiu') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="col-md-4 control-label">Contrase??a*</label>

                      <div class="col-md-12">
                          <input id="password" type="password" class="form-control" name="password" required>

                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <button type="submit" style="margin-top: 12px;" class="btn btn-primary">Crear</button>
                    </div>
                  </div>
                  </div>
                </form>
            </div>
          </div>
@stop
