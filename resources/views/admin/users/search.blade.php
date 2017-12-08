@extends('admin.base')

@section('title', '搜索用户', @parent)

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
      <form action="{{ route('manage.result') }}" method="get">
          <div class="form-group">
              <input type="text" name="condition" class="form-control" placeholder="请输入要搜索的用户名或邮箱" required="" value="{{ old('condition') }}">
          </div>
          <button type="submit" class="btn btn-primary block full-width m-b">搜索用户</button>
      </form>
    </div>
@endsection
