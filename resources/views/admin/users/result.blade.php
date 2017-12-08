@extends('admin.users.base')

@section('title', trans('admin/users.index.title', ['total' => $users->total()]), @parent)

@section('users')
    <div class="ibox">
        <div class="ibox-content">
            @if ($users->total() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-align-middle">
                            <thead>
                                <tr>
                                    <th>@sortablelink('created_at', trans('admin/_globals.tables.created_at'))</th>
                                    <th>@sortablelink('name', trans('admin/_globals.tables.name'))</th>
                                    <th>@sortablelink('email', trans('admin/_globals.tables.email'))</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                    <tr>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('manage.edit',$user->id) }}" class="btn btn-primary">@lang('admin/_globals.buttons.edit')</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                {!! $users->render() !!}
            @else
                <div class="widget p-lg text-center">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                    <h4 class="no-margins">未找到相关用户</h4>
                </div>
            @endif
        </div>
    </div>

@endsection
