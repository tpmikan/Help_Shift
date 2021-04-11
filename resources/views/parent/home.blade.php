@extends('layouts.parent')

@section('title', 'Parent Home')

@section('content')

    <h1>Parent Home</h1>
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-3 px-1 pb-1">
          <a href="{{ action('Admin\ParentController@children') }}" role="button" class="btn btn-primary btn-block">メンバー管理</a>
        </div>
        <div class="col-3 px-1 pb-1">
          <a href="" role="button" class="btn btn-primary btn-block">お手伝い作成</a>
        </div>
        <div class="col-3 px-1 pb-1">
          <a href="" role="button" class="btn btn-primary btn-block">お手伝い削除</a>
        </div>
        <div class="col-3 px-1 pb-1">
          <a href="" role="button" class="btn btn-primary btn-block">承認画面</a>
        </div>
      </div>
      <div class="row">
        <div class="col-3 px-1 pb-1">
          <a href="" role="button" class="btn btn-primary btn-block">お小遣い明細 作成</a>
        </div>
        <div class="col-3 px-1 pb-1">
          <a href="" role="button" class="btn btn-primary btn-block">お小遣い明細 確認</a>
        </div>
        <div class="col-3 px-1 pb-1">
          <a href="" role="button" class="btn btn-primary btn-block">設定</a>
        </div>
      </div>
    </div>
    
@endsection