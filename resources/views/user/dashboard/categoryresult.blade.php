@extends('user.base')

@section('title', '搜索结果', @parent)

@section('content')
  <div class="ibox">
      <div class="ibox-content">
          @if ($categorys->total() > 0)
                  <div class="table-responsive">
                      <table class="table table-striped table-align-middle">
                          <thead>
                              <tr>
                                  <th>@sortablelink('created_at', trans('admin/_globals.tables.created_at'))</th>
                                  <th>@sortablelink('title', trans('admin/_globals.tables.title'))</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($categorys as $key => $category)
                                  <tr>
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
              {!! $categorys->render() !!}
          @else
              <div class="widget p-lg text-center">
                  <i class="fa fa-exclamation-triangle fa-2x"></i>
                  <h4 class="no-margins">未找到相关笔记本，请尝试搜索笔记</h4>
              </div>
          @endif
      </div>
  </div>
@endsection
