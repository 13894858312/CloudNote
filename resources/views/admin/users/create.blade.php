@extends('admin.users.base')

@section('title',  trans('admin/users.create.title'), @parent)

@section('actions')
	<a href="{{ route('admin.users.index') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> @lang('admin/_globals.buttons.back')</a>
@endsection

@section('users')

    @section('subtitle', trans('admin/users.create.title'))

    <div class="tabs-container">
        <form action="{{ route('admin.users.store') }}" method="post">
            <div class="tab-content">
                <div id="tab-contentsdados" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.name'):</label>
                                <div class="col-sm-10"><input type="text" name="name" class="form-control" placeholder="@lang('admin/_globals.forms.name')" value="{{ old('name') }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.email'):</label>
                                <div class="col-sm-10"><input type="email" name="email" class="form-control" placeholder="@lang('admin/_globals.forms.email')" value="{{ old('email') }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.password'):</label>
                                <div class="col-sm-10"><input type="password" name="password" class="form-control" placeholder="@lang('admin/_globals.forms.password')"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('admin/_globals.buttons.create')</button></div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </form>

    </div>

@endsection
