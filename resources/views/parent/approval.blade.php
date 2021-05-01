@extends('layouts.parent')

@section('title', '承認画面')

@section('content')

    <h1>承認画面</h1>
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
      <div class="col-10">
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="20%">申請日</th>
              <th width="20%">申請者</th>
              <th width="20%">お手伝い日</th>
              <th width="20%">お手伝い内容</th>
              <th width="10%">承認</th>
              <th width="10%">却下</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($unapproveds as $unapproved)
              <tr>
                <td class="text-body">{{ date('Y年m月d日',strtotime($unapproved->created_at)) }}</td>
                <td>{{ $unapproved->child->name }}</td>
                <td>{{ date('Y年m月d日',strtotime($unapproved->help->help_day))}}</td>
                <td>{{ $unapproved->help->help_content }}</td>
                <td>
                  <a href="{{ action('Admin\ParentController@approval', ['id' => $unapproved->id]) }}" role="button" class="btn btn-primary">承認</a>
                </td>
                <td>
                  <a href="{{ action('Admin\ParentController@rejected', ['id' => $unapproved->id]) }}"　role="button" class="btn btn-primary">却下</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
@endsection