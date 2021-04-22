@extends('layouts.parent')

@section('title', 'メンバー管理画面')

@section('content')

    <h1>メンバー管理画面</h1>
    
    <div class="container">
      <div class="col-10 py-2">
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="15%">名前</th>
              <th width="15%">誕生日</th>
              <th width="25%">基本お小遣い(×学年倍率)</th>
              <th width="25%">お手伝い単価（×学年倍率）</th>
              <th width="10%">編集</th>
              <th width="10%">削除</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($children as $child)
              <tr>
                <td class="text-body">{{ $child->name }}</td>
                <td>{{ date('Y年m月d日',strtotime($child->birthday)) }}</td>
                <td>{{ $child->basic_price }}</td>
                <td>{{ $child->reward_price }}</td>
                <td>
                  <div>
                    <a href="{{ action('Admin\ParentController@showMemberEdit', ['id' => $child->id]) }}" role="button" class="btn btn-primary">編集</a>
                  </div>
                </td>
                <td>
                  <div>
                    <a href="{{ action('Admin\ParentController@memberDelete', ['id' => $child->id]) }}" role="button" class="btn btn-primary">削除</a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="row">
      <div class="col-2 pt-3 pl-5">
        <a href="{{ action('Admin\ParentController@add') }}" role="button" class="btn btn-primary btn-block">新規追加</a>
      </div>
    </div>
    
@endsection