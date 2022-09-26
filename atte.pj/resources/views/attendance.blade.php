@extends('layouts.app')

@section('main')
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/attendance.css" />


<!-- main -->
<div class="main">
    <h1 class="date">
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
        <td class="name">{{$work->user->getName()}}</td>
        <!-- <td>{{$work->start_time}}</td>
        <td>{{$work->end_time}}</td>
        <td>{{rest_total}}</td>
        <td>{{work_total}}</td> -->
      </tr>
    </table>
  </div>

@endsection