@extends('layouts.parent')

@section('title', 'お手伝い作成')

@section('content')

    <h1>お手伝い作成画面</h1>
    <!-- カレンダー-->
    <div class="container">
      <div class="row align-items-end">
        <div class="col-2">
          <button id="previous" class="btn btn-success btn-block">＜　前月</button>
        </div>
        <div class="col-3">
          <h4 id="yearAndMonth"></h4>
        </div>
        <div class="col-2">
  　  　    <button id="next" class="btn btn-success btn-block">次月　＞</button>
        </div>
      </div>
      <div class="row">
        <div class="col-7 mb-5">
    　  　  <div id="calendar"></div>
        </div>
      </div>
    </div>
    
    @if (count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    @endif
    
    <div class="container">
      <form action="{{ action('Admin\ParentController@helpCreate') }}" method="post">
        <div class="row pb-3">
          <label class="col-2 text-center mb-0">お手伝い内容</label>
          <input type="text" class="form-control col-3" name="help_content">
        </div>
        <div class="row pd-3">
          <label class="col-2 text-center mb-0">お手伝い日</label>
          <input type="date" class="form-control col-3" name="help_start">
          <p class="my-auto">　～　</p>
          <input type="date" class="form-control col-3" name="help_end">
        </div>
        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" value="お手伝い作成">
      </form>
    </div>
    
@endsection