<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="WangXue"/>
        <meta name="keywords" content="php,code,laravel,laravel5,云笔记,在线笔记,笔记,cms"/>
        <meta name="description" content="Cloudnote是一个在线云笔记平台，由laravel框架编写"/>

        <title>{{ config('note.name') }}</title>

        <link href="{!! asset('assets/components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('assets/components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">

        <link href="{!! asset('assets/components/animate.css/animate.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('assets/admin/css/app.css') !!}" rel="stylesheet">

        <link href="{!! asset('assets/admin/favicon.ico') !!}" rel="icon" type="image/x-icon" />

    </head>
    <body class="gray-bg">

        <br>
        <br>

        <div class="text-center">
            <img src="{{ asset('assets/admin/img/note-logo.png') }}" width="250px">
        </div>

        <br>

        @yield('content')

        <hr>

        <p class="m-t text-center"> <small>{{ config('note.name') }} {{ date('Y') }}</small> </p>

        <!-- Mainly scripts -->
        <script src="{!! asset('assets/components/jquery/dist/jquery.min.js') !!}"></script>
        <script src="{!! asset('assets/components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

    </body>
</html>
