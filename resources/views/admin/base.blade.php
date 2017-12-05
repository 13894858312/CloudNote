<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>@yield('title') | {{ config('note.name') }}</title>

        @section('stylesheet')

            <!-- Bootstrap -->
            <link href="{!! asset('assets/components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

            <!-- Font Awesome Icons -->
            <link href="{!! asset('assets/components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">

            <!-- Summernote -->
            <link href="{!! asset('assets/components/summernote/dist/summernote.css') !!}" rel="stylesheet">

            <!-- Animate.css -->
            <link href="{!! asset('assets/components/animate.css/animate.min.css') !!}" rel="stylesheet">

            <!-- Bootstrap datetimepicker -->
            <link href="{!! asset('assets/components/datetimepicker/jquery.datetimepicker.css') !!}" rel="stylesheet">

            <!-- Blueimp Jquery File Upload -->
            <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload.css') !!}" rel="stylesheet">
            <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload-ui.css') !!}" rel="stylesheet">

            <link href="{!! asset('assets/components/switchery/dist/switchery.min.css') !!}" rel="stylesheet" />

            <!-- App -->
            <link href="{!! asset('assets/admin/css/app.css') !!}" rel="stylesheet">

            <link href="{!! asset('assets/admin/favicon.ico') !!}" rel="icon" type="image/x-icon" />

        @show

        <!-- Global Scripts -->
        <script>
            window.Note = {!! json_encode([
                // Laravel CSRF Token
                'csrfToken' => csrf_token(),
            ])  !!}
        </script>

    </head>
    <body class="fixed-sidebar">
        <div id="wrapper" v-cloak>
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header text-center">
                            <div class="profile-element">
                                <img src="{{ asset('assets/admin/img/note.png') }}">
                            </div>
                            <div class="logo-element">
                                <i class="fa fa-comments"></i>
                            </div>
                        </li>
                        <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> <span class="nav-label">@lang('admin/users.module')</span></a></li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper" class="gray-bg dashbard-1">

                <!-- Navbar -->
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-default" href="#"><i class="fa fa-bars"></i> </a>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li><span class="m-r-sm text-muted welcome-message">@lang('admin/_globals.hello') <strong><a href="{{ route('admin.profile.profile') }}" class="no-padding">
                                {{ Auth::user()->name }}</a></strong></span>
                            <li><a href="{{ route('auth.logout') }}"><i class="fa fa-sign-out"></i> @lang('admin/_globals.exit')</a></li>
                        </ul>
                    </nav>
                </div>

                <!-- Content -->
                <div class="row">
                    <div class="col-lg-12">
                        @yield('sidebar')
                        <div class="wrapper wrapper-content">
                            @include('admin._inc.alerts')
                            @yield('content')
                            <br>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @section('javascript')

            <!-- App -->
            <script type="text/javascript" src="{!! asset('assets/admin/js/app.js') !!}"></script>

            <!-- Mainly scripts -->
            <script type="text/javascript" src="{!! asset('assets/components/jquery/dist/jquery.min.js') !!}"></script>

            <!-- jQuery UI -->
            <script type="text/javascript" src="{!! asset('assets/components/jquery-ui/jquery-ui.min.js') !!}"></script>

            <!-- Bootstrap -->
            <script type="text/javascript" src="{!! asset('assets/components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

            <!-- Menu (Scroll && Toogle ) -->
            <script type="text/javascript" src="{!! asset('assets/components/slimScroll/jquery.slimscroll.min.js') !!}"></script>
            <script type="text/javascript" src="{!! asset('assets/components/metisMenu/dist/metisMenu.min.js') !!}"></script>

            <!-- ChartJS-->
            <!-- <script type="text/javascript" src="{!! asset('assets/components/Chart.js/dist/Chart.min.js') !!}"></script> -->

            <!-- Summernote (Editor) -->
            <script type="text/javascript" src="{!! asset('assets/components/summernote/dist/summernote.min.js') !!}"></script>
            <script type="text/javascript" src="{!! asset('assets/components/summernote/dist/lang/summernote-pt-BR.min.js') !!}"></script>

            <!-- Bootstrap datetimepicker -->
            <script src="{!! asset('assets/components/datetimepicker/build/jquery.datetimepicker.full.min.js') !!}" type="text/javascript"></script>

            <!-- Pace (Loading) -->
            <script type="text/javascript" src="{!! asset('assets/components/pace/pace.min.js') !!}"></script>

            <!-- Switchery -->
            <script type="text/javascript" src="{!! asset('assets/components/switchery/dist/switchery.min.js') !!}"></script>

        @show

    </body>
</html>
