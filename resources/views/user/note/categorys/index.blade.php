@extends('user.note.base')

@section('title', trans('admin/note.categorys.index.title', ['total' => $categorys->total()]), @parent)

@section('actions')
	<a href="{{ route('user.note.categorys.create') }}" class="btn dim btn-primary"><i class="fa fa-plus"></i> @lang('admin/_globals.buttons.create')</a>
@endsection

@section('note')

	@section('subtitle', trans('admin/note.categorys.index.title', ['total' => $categorys->total()]))

	<div class="ibox">
        <div class="ibox-content">
            @if ($categorys->total() > 0)
                <form action="{{ route('user.note.categorys.destroy') }}" method="post">
                    {{ csrf_field() }}
                    <div class="table-responsive">
                        <table class="table table-striped table-align-middle">
                            <thead>
                                <tr>
                                    <th>@sortablelink('id', '#')</th>
                                    <th>@sortablelink('created_at', trans('admin/_globals.tables.created_at'))</th>
                                    <th>@sortablelink('title', trans('admin/_globals.tables.title'))</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categorys as $key => $category)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" name="categorys[]" value="{{ $category->id }}"></td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('user.note.categorys.edit',$category->id) }}" class="btn btn-primary">@lang('admin/_globals.buttons.edit')</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> @lang('admin/_globals.buttons.delete_selected')</button>
                </form>
                {!! $categorys->render() !!}
            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">@lang('admin/note.categorys.index.is_empty')</h4>
                </div>
            @endif
        </div>
    </div>

@endsection
