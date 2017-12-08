@extends('user.base')

@section('title',  '笔记内容'), @parent)

@section('content')

    <div class="page-heading">
    	<div class="pull-right">
          <button class="btn btn-default" onclick="takeScreenshot()">截图</button>
          <button class="btn btn-default" onclick="getPDF()">导出pdf</button>
          <a href="{{ route('user.note.posts.index') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> @lang('admin/_globals.buttons.back')</a>
	    </div>
        <h2>@lang('admin/note.module') <small><i class="fa fa-angle-right"></i> @yield('subtitle')</small></h2>
    </div>

    <div id="note-content" class="panel-body" style="background-color:#ffffff">
      {!!$post->description!!}
    </div>

@endsection
