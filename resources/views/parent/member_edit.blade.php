@extends('layouts.parent')

@section('title', 'メンバー編集')

@section('content')

    <h1>メンバー編集</h1>
    
    <div class="container">
      <div class="col-10 py-2">
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="15%">名前</th>
              <th width="15%">誕生日</th>
              <th width="25%">現在の基本お小遣い</th>
              <th width="25%">現在のお手伝い単価</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $child->name }}</td>
              <td>{{ date('Y年m月d日',strtotime($child->birthday)) }}</th>
              <td>{{ $child->basic_price }}</td>
              <td>{{ $child->reward_price }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <form action="{{ action('Admin\ParentController@memberEdit') }}" method="post">
        @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $e)
              <li>{{ $e }}</li>
            @endforeach
          </ul>
        @endif
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
          <input type="hidden" name="id" value="{{ $child->id }}">
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="編集">
        </form>
    </div>
    
    
@endsection