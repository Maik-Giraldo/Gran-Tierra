@extends('adminlte::masterexport')
@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
          <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/color.css')}} ">
    @stack('css')
    @yield('css')
@stop

@section('body_class', 'skin-' . config('adminlte.skin', 'greem') . ' sidebar-mini ' . (config('adminlte.layout') ? [
    'boxed' => 'layout-boxed',
    'fixed' => 'fixed',
    'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

@section('body')
        <!-- Main Header -->
        <header class="main-header">
            @if(config('adminlte.layout') == 'top-nav')
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="navbar-brand">
                            {!! config('adminlte.logo', '<b>Valorem</b>CW') !!}
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            @each('adminlte::partials.menu-item-top-nav', $adminlte->menu(), 'item')
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
            @else
            <!-- Logo -->
            

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="navbar-brand" style="height:58px;margin-top: -8px;width: 162px;background-color: #fff;">
                        {!! config('adminlte.logo', '<b>Valorem</b>CW') !!}
                    </a>
                </div>
                <!-- Sidebar toggle button-->
            @endif
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
               @if($countntfs > 0)
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning" style="font-size: 14px;">{{$countntfs}}</span>
                </a>
                    <ul class="dropdown-menu">
                      <li class="header">Usted tiene {{$countntfs}} notificaciones</li>
                      <li>
                <ul class="menu">
                  @foreach($ntfcs as $ntfcn)
                  <li>
                    <a href="{{url('notificaciones/ver')}}">
                      <i class="fa fa-users text-aqua"></i>{{$ntfcn->notificacion}}
                    </a>
                  </li>
                  @endforeach
                </ul>
                    </li>
                  <li class="footer"><a href="{{url('notificaciones/ver')}}">Ver todo</a></li>
                </ul>
              </li>
              @endif
                <li>
                            @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                                <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}">
                                    <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                </a>
                            @else
                                <a href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                >
                                    <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                </a>
                                <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                                    @if(config('adminlte.logout_method'))
                                        {{ method_field(config('adminlte.logout_method')) }}
                                    @endif
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </li>
                    </ul>
                </div>
                @if(config('adminlte.layout') == 'top-nav')
                </div>
                @endif
            </nav>
        </header>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if(config('adminlte.layout') == 'top-nav')
            <div class="container">
            @endif

            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content_header')
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
            @if(config('adminlte.layout') == 'top-nav')
            </div>
            <!-- /.container -->
            @endif
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <p class="text-right">&copy; 2020  Todos los derechos reservados. <a target="_blank" href="http://actituddigital.com">Actitud Digital</a></p>
        </footer>
    <!-- ./wrapper -->
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
