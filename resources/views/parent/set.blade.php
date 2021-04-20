@extends('layouts.parent')

@section('title', '設定')

@section('content')

    <h1>設定</h1>
    
    <div class="container">
      <div class="col-7">
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="30%">学年</th>
              <th width="30%">倍率</th>
              <th width="20%">変更</th>
              <th width="20%">操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sets as $set)
            <form action="{{ action('Admin\ParentController@set') }}" method="post">
              <tr>
                <td class="text-body">{{ $set->grade }}</th>
                <td>{{ $set->magnification }}</td>
                <td>
                  <input type="number" step="0.1" name="magnification" min="0.1" value="{{ $set->magnification }}" style="width:80px;">
                </td>
                <td>
                  <input type="hidden" name="id" value="{{ $set->id }}">
                  {{ csrf_field() }}
                  <input type="submit" class="btn btn-primary" value="編集">
                </td>
              </tr>
            </form>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
    
@endsection