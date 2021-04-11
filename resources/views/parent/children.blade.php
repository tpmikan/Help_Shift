@extends('layouts.parent')

@section('title', 'メンバー管理画面')

@section('content')

    <h1>メンバー管理画面</h1>
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-2 px-1">
          <a href="{{ action('Admin\ParentController@add') }}" role="button" class="btn btn-primary btn-block">新規追加</a>
        </div>
        <div class="col-2 px-1">
          <a href="" role="button" class="btn btn-primary btn-block">編集</a>
        </div>
        <div class="col-2 px-1">
          <a href="" role="button" class="btn btn-primary btn-block">削除</a>
        </div>
      </div>  
    </div>
    
@endsection