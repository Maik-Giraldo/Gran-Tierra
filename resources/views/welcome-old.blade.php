<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="">
    <title>Certiweb | Portal de proveedores, Certificados tributarios IVA, Ica y RTF, Seguimiento de Facturas, Noticas y Notificaciones</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/site.css') }}">
<style>html, body {
	background: #eee;
	-webkit-box-shadow: inset 0 0 100px rgba(0,0,0,.5);
	box-shadow: inset 0 0 100px rgba(0,0,0,.5);
	height: 100%;
	min-height: 100%;
	position: relative;
}
#login-wrapper {
	position: relative;
	top: 30%;
}
#login-wrapper .registration-block {
	margin-top: 15px;
}</style></head>
<body class="login-splash">


<div class="container" id="login-wrapper">
	<div class="row">
		<div class="col-md-7">

			<div class="panel intro">

				<div class="brand-wrapper">
					<img width="120" src="{{ asset('images/avon.png') }}" alt="certiweb" />
				</div>

				<h2>Bienvenido(a)</h2>
				<h4>Al Portal de proveedores de Bavaria.</h4>
				<p>Desde esta plataforma web accederá a la información financiera de una manera ágil, oportuna y segura , garantizando la comunicación con nuestros proveedores.</p>
				<p>Usted podrá consultar la siguiente información financiera:</p>
				<ul>
					<li>Certificados Tributarios (IVA, ICA y RTF).</li>
					<li>Estado de facturas.</li>
					<li>Noticias y Notificaciones.</li>
					<li>Inscripción como proveedor.</li>
				</ul>
				<p>Si tiene dudas por favor comuníquese a la línea de atención 638 9000 o escribanos a departamento.impuestos@bavaria.com</p>
				<!--<div class="row registration-block">
					<div class="col-sm-12">
						<a href="/user-management/auth/registration">Registro de proveedor</a>					</div>
				</div>-->

			</div>


		</div>
		<div class="col-md-5 col-color">
			<div class="panel panel-default">
								<div class="panel-heading">
					<h3 class="panel-title">Ingresar a mi cuenta</h3>
				</div>
				<div class="panel-body">

					<form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
               	 {!! csrf_field() !!}
               	 @if (Session::has('errors'))
                   <div class="center-align">
                     <div class="chip z-depth-3" style="color:white;">
                         Error:
                     @foreach ($errors->all() as $error) {{ $error }}
                     @endforeach
                   </div>
                   </div>
                 @endif
				<div class="form-group field-loginform-nit">
          @if ($errors->has('Nit'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('Nit') }}</strong>
              </span>
          @endif
				<input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
				<p class="help-block help-block-error"></p>
				</div>
				<div class="form-group field-loginform-password required">
          @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
					<input type="password" id="password" class="form-control" name="password" placeholder="Contraseña" autocomplete="off">
					<p class="help-block help-block-error"></p>
					</div>
					<button type="submit" class="btn btn-lg">Entrar</button>
				<div class="form-group field-loginform-rememberme">
          <div class="checkbox">
          			<label>
          			<input type="checkbox" name="remember">
          			 {{ trans('adminlte::adminlte.remember_me') }}
          			</label>
          <p class="help-block help-block-error"></p>

          </div>
          </div>
					</form>
					<a href="{{ url(config('adminlte.password_reset_url', 'password/reset')) }}"
                   class="text-center">Recordar contraseña</a>  |
					<a href="{{ url(config('adminlte.register_url', 'register')) }}"
                       class="text-center"
                    >Registro</a>
  				</div>
			</div>
		</div>
	</div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-center">&copy;  2018 Todos los derechos reservados.  <a target="_blank" href="http://actituddigital.com">Actitud Digital</a></p>
    </div>
</footer>
</body>
</html>
