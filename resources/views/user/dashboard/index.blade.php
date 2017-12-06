@extends('user.base')

@section('title', trans('user/dashboard.module'), @parent)

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
      <form action="{{ route('user.search') }}" method="post">
          <div class="form-group">
              <input type="text" name="title" class="form-control" placeholder="请输入搜索内容" required="" value="{{ old('condition') }}">
          </div>
          <button type="submit" class="btn btn-primary block full-width m-b">搜索</button>
      </form>
    </div>
@endsection
