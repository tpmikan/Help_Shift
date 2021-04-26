@extends('layouts.parent')

@section('title', 'メンバー新規追加')

@section('content')

    <h1>メンバー新規追加</h1>
    
    <div class="container-fluid">
      <form action="{{ action('Admin\ParentController@childrenAdd') }}" method="post">
        @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $e)
              <li>{{ $e }}</li>
            @endforeach
          </ul>
        @endif
        <div class="form-group row">
          <label class="col-2 text-center">名前</label>
          <div class="col-6">
            <input type="text" class="form-control" name="name">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 text-center">パスワード</label>
          <div class="col-6">
            <input type="password" class="form-control" name="password">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 text-center">誕生日</label>
          <div class="col-6">
            <input type="date" class="form-control" name="birthday">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 text-center">基本お小遣い</label>
          <div class="col-6">
            <input type="number" class="form-control" name="basic_price">
          </div>
          <p>円</p>
        </div>
        <div class="form-group row">
          <label class="col-2 text-center">お小遣い単価</label>
          <div class="col-6">
            <input type="number" class="form-control" name="reward_price">
          </div>
          <p>円</p>
        </div>
        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" value="新規追加">
      </form>
    </div>
    
@endsection