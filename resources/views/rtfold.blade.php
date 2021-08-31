@extends('layouts.panel')

@section('content')
<div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <img tex-align="center" src="images/bavaria.png" id="complete-logo-nav">
                        <a class="navbar-brand" href="#">Bavaría</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        
                        <ul class="navbar-nav">
<!--                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Acciones</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <!--<a class="dropdown-item" href="#">Action</a>-->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header" style="height: 100px; padding-bottom: 4px;">
                <!--<canvas id="bigDashboardChart"></canvas>-->
            </div>
            <div class="content">
                <div class="row">
                 <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Exportar archivo pdf de certificado Retención en la fuente</h4>
                                <!--{{Auth::user()->name}}-->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form method="POST" action="rtf"
        accept-charset="UTF-8" id="expedirrtf" name="expedirtf"
        enctype="multipart/form-data" target="_blank">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="nit" id="nit" value="{{Auth::user()->Nit}}">
         <div class="form-group">
          <label for="ano">Año</label>
          <select class="form-control" id="anio" name="anio" required>
            <option value="">Seleccionar ...</option>
            <option value="2008">2008</option>
      			<option value="2009">2009</option>
      			<option value="2010">2010</option>
            <option value="2011">2011</option>
      			<option value="2012">2012</option>
      			<option value="2013">2013</option>
      			<option value="2014">2014</option>
      			<option value="2015">2015</option>
      			<option value="2016">2016</option>
      			<option value="2017">2017</option>
      			<option value="2018">2018</option>
      			<option value="2019">2019</option>
      			<option value="2020">2020</option>
          </select>
        </div>
        <br>
            <div style="text-align: center">
              <button class="btn btn-success btn-round btn-lg">
                  <i class="now-ui-icons arrows-1_cloud-download-93"></i> <strong>Generar</strong>
            </button>  
            </div>

      </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row">
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, Todos los derechos reservados.
                        <a href="www.actituddigital.com" target="_blank">Actitud Digital</a>.
                    </div>
                </div>
            </footer>
        </div>
@endsection
