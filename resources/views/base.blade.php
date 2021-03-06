<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8"/>
      <meta name="author" content="WangXue"/>
      <meta name="keywords" content="php,code,laravel,laravel5,云笔记,在线笔记,笔记,cms"/>
      <meta name="description" content="Cloudnote是一个在线云笔记平台，由laravel框架编写"/>

      <title>Cloudnote</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:300,700" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-family: 'Arial';
                color: #888;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            h4 {
                font-family: 'Lato';
                font-weight: 300;
                font-size: 20px;
            }
            h4 strong {
                font-weight: 700;
            }
            .btn {
                text-decoration: none;
                background-color: #273643;
                color: #fff;
                padding: 10px 15px;
                border-radius: 4px;
                font-size: 12px;
                text-transform: uppercase;
            }
            #background {
                background-image:url('assets/admin/img/background.png');
                background-size: cover;
            }
        </style>
    </head>
    <body style="background-image:url('assets/admin/img/background.png');background-size:cover;">
        <div class="container">
            <div class="content">
                <img src="{{ asset('assets/admin/img/note-logo.png') }}" width="250">
                <h4><strong>{{ config('note.name') }}</strong> 王雪-151250149 {{ config('note.laravel') }}</h4>
                <a href="{{ route('index') }}" class="btn">Enter</a>
            </div>
        </div>
    </body>
</html>
