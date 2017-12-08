<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="WangXue"/>
        <meta name="keywords" content="php,code,laravel,laravel5,云笔记,在线笔记,笔记,cms"/>
        <meta name="description" content="Cloudnote是一个在线云笔记平台，由laravel框架编写"/>

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
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-dashboard"></i> <span class="nav-label">@lang('admin/dashboard.module')</span></a>
                          <ul class="nav nav-second-level">
                              <li><a href="{{ route('user.categorysearch') }}">搜索笔记本</a></li>
                              <li><a href="{{ route('user.notesearch') }}">搜索笔记</a></li>
                          </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-text"></i> <span class="nav-label">@lang('admin/note.module')</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ route('user.note.categorys.index') }}">@lang('admin/note.submodule.categorys')</a></li>
                                <li><a href="{{ route('user.note.posts.index') }}">@lang('admin/note.submodule.posts')</a></li>
                            </ul>
                        </li>
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
                            <li><span class="m-r-sm text-muted welcome-message">@lang('admin/_globals.hello') <strong><a href="{{ route('user.profile.profile') }}" class="no-padding">
                                {{ Auth::user()->name }}</a></strong></span>
                            <li><a href="{{ route('auth.logout') }}"><i class="fa fa-sign-out"></i> @lang('admin/_globals.exit')</a></li>
                        </ul>
                    </nav>
                </div>

                <!-- Content -->
                <div class="row">
                    <div class="col-lg-12">
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

            <!-- Summernote (Editor) -->
            <script type="text/javascript" src="{!! asset('assets/components/summernote/dist/summernote.min.js') !!}"></script>
            <script type="text/javascript" src="{!! asset('assets/components/summernote/dist/lang/summernote-pt-BR.min.js') !!}"></script>

            <!-- Bootstrap datetimepicker -->
            <script src="{!! asset('assets/components/datetimepicker/build/jquery.datetimepicker.full.min.js') !!}" type="text/javascript"></script>

            <!-- Pace (Loading) -->
            <script type="text/javascript" src="{!! asset('assets/components/pace/pace.min.js') !!}"></script>

            <!-- Switchery -->
            <script type="text/javascript" src="{!! asset('assets/components/switchery/dist/switchery.min.js') !!}"></script>

            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
            <script type="text/javascript" src="http://html2canvas.hertzen.com/build/html2canvas.js"></script>
            <script type="text/javascript">
              function getPDF(){
                html2canvas( document.getElementById('note-content'), {
                    onrendered: function(canvas) {
                        var imgData = canvas.toDataURL('image/jpeg');
                        var doc = new jsPDF("p", "mm", "a4");
                        doc.addImage(imgData, 'JPEG', 0, 0,210,297);
                        doc.save('note.pdf');
                    }
                });
              }
            </script>
            <script type="text/javascript">
                function takeScreenshot() {
                  //
                  // var dom=$(".note_content"); //你要转变的dom
                  // var width = dom.width();
                  // var height = dom.height();
                  // var type = "png";
                  // var scaleBy = 8;  //缩放比例
                  // var canvas = document.createElement('canvas');
                  // canvas.width = width * scaleBy;
                  // canvas.height = height * scaleBy+35;  //35是我处理完后发现短了一点，具体为什么不清楚,如果你也少的话，根据自己的项目调吧
                  // canvas.style.width = width * scaleBy + 'px';
                  // canvas.style.height = height * scaleBy + 'px';
                  // var context = canvas.getContext('2d');
                  // context.scale(scaleBy, scaleBy);
                  //   html2canvas(document.getElementById('note-content'), {
                  //   canvas:canvas,
                  //   onrendered: function (canvas) {
                  //     var url = canvas.toDataURL();
                  //     var triggerDownload = $("<a>").attr("href", url).attr("download", "note.png").appendTo("body");
                  //     triggerDownload[0].click();
                  //     triggerDownload.remove();
                  //   }
                  html2canvas(document.getElementById('note-content'), {
                    onrendered: function(canvas) {
                        var url = canvas.toDataURL();
                        var triggerDownload = $("<a>").attr("href", url).attr("download", "note.png").appendTo("body");
                        triggerDownload[0].click();
                        triggerDownload.remove();
                    },
                  });
                }
            </script>
        @show

    </body>
</html>
