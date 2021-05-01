@extends('layouts.parent')

@section('title', 'お小遣い　計算')

@section('content')

    <h1>お小遣い計算画面</h1>
    
    <div class="container py-5">
      <form action="{{ action('Admin\ParentController@calculation') }}">
        <div class="row col-10 py-2">
          <label class="col-2 px-3">子供の選択</label>
          <select name="child_name" size="1">
            @foreach($children as $child)
              <option value="{{ $child->id }}">{{ $child->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="row col-10 py-2">
          <label class="col-2 px-3">期間</label>
          <input type="month" name=help_month>
        </div>
        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" value="お小遣い計算">
      </form>
    </div>
    
@endsection