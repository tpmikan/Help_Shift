@extends('layouts.child')

@section('title', 'お手伝いをする')

@section('content')
    <h1>お手伝いをする</h1>
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
    
    <div class="container">
      <div class="col-7">
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="30%">日付</th>
              <th width="40%">お手伝い内容</th>
              <th width="30%">操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($helps as $help)
              <tr>
                <td>{{ date('Y年m月d日',strtotime($help->help_day)) }}</th>
                <td>{{ $help->help_content }}</td>
                <td>
                  <a href="{{ action('Child\ChildController@help', ['id' => $help->id]) }}"　role="button" class="btn btn-primary">お手伝い申請</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
@endsection