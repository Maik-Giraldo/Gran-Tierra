<!DOCTYPE html>
<html>
  <head>
    <title>Certiweb</title>
    <link rel="shortcut icon" href="<?php echo URL::to('favicon.ico'); ?>">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assetslog/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assetslog/css/styles.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assetslog/css/bootstrap-theme.min.css')}}"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <br>
            <br>
            <img align="center" src="images/logobavaria.png"
            style=" display: block;
            margin-left: auto;
            margin-right: auto;
            border:none;" alt="" width="100px;" />  
        </div>
        </div>
      </div>  
    @yield('content')
    <br>
    <br>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <p class="parrafo">
             
            </p>
          </div>
        </div>
        <div class="row">
<!--          <div class="col-md-10 fltRight">
            N&uacute;mero de Visitas:
            <div class="contador">
              <?php
                //contador de visitas
//                $visitas = file_get_contents("files/count.txt");
//                echo $visitas;  
              ?>
            </div>
          </div>-->
          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="pie">
                Cualquier inquietud por favor escribir a certificados.bavaria@bav.sabmiller.com<br><br>
                
            Certiweb<br>
              Todos lo derechos reservados Certiweb 2018--UN PRODUCTO DE ACTITUD DIGITAL--
            </div>
          </div>  
        </div>
      </div> 
    </footer>  
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{asset('assetslog/js/jquery.min.js')}}"></script>
    <script src="{{asset('assetslog/js/bootstrap.min.js')}}"></script>    
    @yield('scripts')
  </body>
</html>
  