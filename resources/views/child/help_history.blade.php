@extends('layouts.child')

@section('title', 'お手伝い履歴')

@section('content')
    <h1>お手伝い履歴</h1>
     <!-- カレンダー-->
    <div class="container">
      <div class="col-10">
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="30%">お手伝い日</th>
              <th width="60%">お手伝い内容</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($helps_history as $help_history)
              <tr>
                <td class="text-body">{{ date('Y年m月d日',strtotime($help_history->help_day))}}</td>
                <td class="text-body">{{ $help_history->help_content }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
 
    
@endsection