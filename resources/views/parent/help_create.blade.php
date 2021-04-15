@extends('layouts.parent')

@section('title', 'お手伝い　作成')

@section('content')

    <h1>お手伝い作成画面</h1>
    <!-- カレンダー-->
    <div class="container">
      <div class="row align-items-end">
        <div class="col-3 mx-auto">
          <button id="previous" class="btn btn-success btn-block">＜　前月</button>
        </div>
        <div class="col-4 mx-auto">
          <h4 id="yearAndMonth"></h4>
        </div>
        <div class="col-3 mx-auto">
  　  　    <button id="next" class="btn btn-success btn-block">次月　＞</button>
        </div>
      </div>
      <div class="col-9 mx-auto mb-5">
  　  　  <div id="calendar"></div>
      </div>
    </div>
    
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