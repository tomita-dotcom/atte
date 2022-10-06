@extends('layouts.app')

@section('main')
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/attendance.css" />
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->





<!-- main -->
<div class="main">
    <h1 class="date-ttl">
      <form action="{{route('attendance.other_day')}}" method="post">
          @csrf
          <!-- 見えないinputタグで$display-dateを渡す -->
          <input type="hidden" name="display_date" value="{{ $display_date }}">
          <button type="submit" name="select_day" value="back" class="date-change">
            <
          </button>
      </form>
      <div class="date">
        {{$display_date}}
      </div>
      <form action="{{route('attendance.other_day')}}" method="post">
          @csrf
          <!-- 見えないinputタグで$display_dateを渡す -->
          <input type="hidden" name="display_date" value="{{ $display_date }}">
          <button type="submit" name="select_day" value="next" class="date-change">
            >
          </button>
      </form>
    </h1>
    <table class="work-schedule">
      <tr class="table-title">
        <th class="name">名前</th>
        <th>勤務開始</th>
        <th>勤務終了</th>
        <th>休憩時間</th>
        <th>勤務時間</th>
      </tr>
      @foreach($works as $work)
      <tr>
        <td class="name">{{$work->user->name}}</td>
        <td>{{$work->start_time}}</td>
        <td>{{$work->end_time}}</td>
        <td>{{$work->total_rests()}}</td>
        <td>{{$work->total_works()}}</td>
      </tr>
      @endforeach
    </table>
    {{ $works->appends($display_date)->links('vendor.pagination.bootstrap-4') }}
  </div>

@endsection