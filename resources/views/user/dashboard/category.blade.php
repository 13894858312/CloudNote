@extends('user.base')

@section('title', trans('admin/dashboard.module'), @parent)

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
      <form action="{{ route('user.search.category') }}" method="get">
          <div class="form-group">
              <input type="text" name="condition" class="form-control" placeholder="请输入要搜索的笔记本标题" required="" value="{{ old('condition') }}">
          </div>
          <button type="submit" class="btn btn-primary block full-width m-b">搜索笔记本</button>
      </form>
    </div>
@endsection
