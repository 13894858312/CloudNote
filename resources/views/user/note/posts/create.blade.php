@extends('user.note.base')

@section('title',  trans('admin/note.posts.create.title'), @parent)

@section('stylesheet')

    @parent

    <!-- Blueimp Jquery File Upload -->
    <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload-ui.css') !!}" rel="stylesheet">

@show

@section('actions')
    <a href="{{ route('user.note.posts.index') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> @lang('admin/_globals.buttons.back')</a>
@endsection

@section('note')

	@section('subtitle',  trans('admin/note.posts.create.title'))

	<div class="tabs-container">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-contents"> @lang('admin/_globals.forms.nav.contents')</a></li>
            <li><a data-toggle="tab" href="#tab-images"> @lang('admin/_globals.forms.nav.images')</a></li>
        </ul>

		<form action="{{ route('user.note.posts.store') }}" class="fileupload" method="post" enctype="multipart/form-data">
            <div class="tab-content">

                <div id="tab-contents" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.category'):</label>
                                <div class="col-sm-10">
                                    @if($categorys->count() > 0)
                                        <select name="category_id" class="form-control">
                                            @foreach($categorys as $key => $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <a href="{{ route('user.note.categorys.create') }}" class="btn dim btn-primary"><i class="fa fa-plus"></i> @lang('admin/_globals.buttons.create')</a> @lang('admin/note.categorys.index.is_empty')
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.title'):</label>
                                <div class="col-sm-10"><input type="text" name="title" class="form-control" value="{{ old('title') }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.content'):</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control summernote">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('admin/_globals.buttons.create')</button></div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div id="tab-images" class="tab-pane">
                    <div class="panel-body">
                        @include('admin._inc.fileupload.buttons',['extensions' => ['GIF', 'JPG', 'JPEG', 'PNG']])
                    </div>
                </div>

            </div>
        </form>

	</div>

@endsection


@section('javascript')

    @parent

    @include('admin._inc.fileupload.upload')
    @include('admin._inc.fileupload.download')

    <!-- Blueimp Jquery File Upload -->
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/vendor/jquery.ui.widget.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-tmpl/js/tmpl.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-load-image/js/load-image.all.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-canvas-to-blob/js/canvas-to-blob.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.iframe-transport.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-process.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-image.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-audio.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-video.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-validate.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-ui.js') !!}"></script>

    <script type="text/javascript">

        // Initialize the jQuery File Upload widget:
        $('.fileupload').fileupload({
            autoUpload: true,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png|bmp)$/i,
            maxFileSize: 10240000, // 10 MB
            url: '{{ route('user.note.posts.upload',"temp-" . Auth::user()->id) }}',
        });

         // Load existing files:
        $('.fileupload').addClass('fileupload-processing');

        $.ajax({
            url: $('.fileupload').fileupload('option', 'url'),
            dataType: 'json',
            context: $('.fileupload')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done').call(this, $.Event('done'), {result: result});
        });

    </script>

@stop
