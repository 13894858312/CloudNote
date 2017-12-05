@extends('user.base')

@section('content')

    <div class="page-heading">
    	<div class="pull-right">
	    	@yield('actions')
	    </div>
        <h2>@lang('admin/note.module') <small><i class="fa fa-angle-right"></i> @yield('subtitle')</small></h2>
    </div>

    @yield('note')

@endsection
