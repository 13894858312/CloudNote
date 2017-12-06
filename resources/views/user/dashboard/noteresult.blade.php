@extends('user.base')

@section('title', trans('admin/dashboard.module'), @parent)

@section('content')
	<div class="ibox">
        <div class="ibox-content">
            @if ($posts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-align-middle">
                            <thead>
                                <tr>
                                    <th>@sortablelink('created_at', trans('admin/_globals.tables.created_at'))</th>
                                    <th>@sortablelink('category_id', trans('admin/_globals.tables.category'))</th>
                                    <th>@sortablelink('title', trans('admin/_globals.tables.title'))</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $key => $post)
                                    <tr>
                                        <td>{{ $post->created_at->diffForHumans() }}</td>
                                        <td>{{ $post->category->title }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            <a href="{{ route('user.note.posts.edit',$post->id) }}" class="btn btn-primary">编辑</a>
                                        </td>
																				<td>
                                            <a href="{{ route('user.note.posts.detail',$post->id) }}" class="btn btn-primary">查看</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">没有符合条件的笔记</h4>
                </div>
            @endif
        </div>
    </div>

@endsection
