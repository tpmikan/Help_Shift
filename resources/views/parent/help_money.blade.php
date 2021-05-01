@extends('layouts.parent')

@section('title', 'お小遣い')

@section('content')

    <h1>お小遣い</h1>
    
    <div class="container py-5">
      <table>
        <thead>
          <tr>
            <th>名前</th>
            <th>お手伝い日数</th>
            <th>基本お小遣い</th>
            <th>お手伝い代</th>
            <th>合計お小遣い金額</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-body">{{ $child->name }}</td>
            <td>{{ $helps_count }}日</td>
            <td>{{ $child->basic_price }}</td>
            <td>{{ $child->reward_price }}</td>
            <td class="text-body">{{ $total_price }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    
    
@endsection