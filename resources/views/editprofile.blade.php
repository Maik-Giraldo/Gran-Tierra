@extends('adminlte::page')
@section('title', 'Certiweb | Demo')

@section('content_header')
    <h1>Cambiar Contraseña</h1>
    <ul class="breadcrumb"><li><a href="{{url('home')}}">Inicio</a></li>
    <li class="active">Cambiar Contraseña</li>
    </ul>
@stop

        @section('content')
        <div class="box box-warning">
        <div class="seguimiento-facturas-index box-body">
        <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <form method="POST" action="{{url('editprofile')}}" accept-charset="UTF-8" id="editprofile" name="editprofile"
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
                          <input id="Empresa" type="text" class="form-control" name="Empresa" value="{{ Auth::user()->Empresa}}" required autofocus>
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
                                  <input id="Nit" type="text" class="form-control" name="Nit" value="{{ Auth::user()->Nit}}"  required autofocus>
                                  <input id="id" type="hidden" class="form-control" name="id" value="{{ Auth::user()->id}}">
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
                          <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name}}"  required autofocus>

                          @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="col-md-4 control-label">Email*</label>

                      <div class="col-md-12">
                          <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email}}" required>
                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('Tel') ? ' has-error' : '' }}">
                      <label for="Tel" class="col-md-4 control-label">Teléfono*</label>

                      <div class="col-md-12">
                          <input id="tel" type="text" class="form-control" name="Tel" value="{{ Auth::user()->Tel}}"  required autofocus>

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
                          <input id="Ciudad" type="text" class="form-control" name="Ciudad" value="{{ Auth::user()->Ciudad}}" required autofocus>

                          @if ($errors->has('Ciudad'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('Ciudad') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('Direccion') ? ' has-error' : '' }}">
                      <label for="Direccion" class="col-md-4 control-label">Dirección*</label>
                      <div class="col-md-12">
                          <input id="Direccion" type="text" class="form-control" name="Direccion" value="{{ Auth::user()->Direccion}}" required autofocus>
                          @if ($errors->has('Direccion'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('Direccion') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('ciiu') ? ' has-error' : '' }}">
                      <label for="ciiu" class="col-md-4 control-label">Código CIIU</label>

                      <div class="col-md-12">
                          <input id="ciiu" type="text" class="form-control" name="ciiu"value="{{ Auth::user()->ciiu}}" autofocus>

                          @if ($errors->has('ciuu'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('ciiu') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="col-md-4 control-label">Contraseña (Dejar vacío para la misma)</label>

                      <div class="col-md-12">
                          <input id="password" type="password" class="form-control" name="password">

                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <button type="submit" style="margin-top: 12px;" class="btn btn-primary">Guardar</button>
                    </div>
                  </div>
                  </div>
                </form>
            </div>
          </div>
@stop

