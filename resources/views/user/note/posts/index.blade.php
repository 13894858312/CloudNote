@extends('user.note.base')

@section('title', trans('admin/note.posts.index.title', ['total' => $posts->total()]), @parent)

@section('actions')
	<a href="{{ route('user.note.posts.create') }}" class="btn dim btn-primary"><i class="fa fa-plus"></i> @lang('admin/_globals.buttons.create')</a>
@endsection

@section('note')

	@section('subtitle', trans('admin/note.posts.index.title', ['total' => $posts->total()]))

	<div class="ibox">
        <div class="ibox-content">
            @if ($posts->total() > 0)
                <form action="{{ route('user.note.posts.destroy') }}" method="post">
                    {{ csrf_field() }}
                    <div class="table-responsive">
                        <table class="table table-striped table-align-middle">
                            <thead>
                                <tr>
                                    <th>@sortablelink('id', '#')</th>
                                    <th>@sortablelink('created_at', trans('admin/_globals.tables.created_at'))</th>
                                    <th>@sortablelink('category_id', trans('admin/_globals.tables.category'))</th>
                                    <th>@sortablelink('title', trans('admin/_globals.tables.title'))</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $key => $post)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" name="posts[]" value="{{ $post->id }}"></td>
                                        <td>{{ $post->created_at->diffForHumans() }}</td>
                                        <td>{{ $post->category->title }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('user.note.posts.edit',$post->id) }}" class="btn btn-primary">查看</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> @lang('admin/_globals.buttons.delete_selected')</button>
                </form>
                {!! $posts->render() !!}
            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">@lang('admin/note.posts.index.is_empty')</h4>
                </div>
            @endif
        </div>
    </div>

@endsection
