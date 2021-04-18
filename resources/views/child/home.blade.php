@extends('layouts.child')

@section('title', 'ホーム')

@section('content')
    <h1>ホーム</h1>
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
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-3 px-1 pb-1">
          <a href="{{ action('Child\ChildController@showHelp') }}" role="button" class="btn btn-primary btn-block">お手伝いをする</a>
        </div>
        <div class="col-3 px-1 pb-1">
          <a href="{{ action('Child\ChildController@showCancel')}}" role="button" class="btn btn-primary btn-block">お手伝いのキャンセル</a>
        </div>
        <div class="col-3 px-1 pb-1">
          <a href="" role="button" class="btn btn-primary btn-block">お手伝い履歴</a>
        </div>
      </div>
    </div>
    
@endsection