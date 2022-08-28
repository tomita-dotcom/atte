@extends('layouts.app')

@section('main')
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/attendance.css" />

<!-- header -->
  <header class="header">
    <h1 class="header-ttl">
      Atte
    </h1>
    <nav class="header-nav">
      <ul class="header-nav-list">
        <li class="header-nav-item">ホーム</li>
        <li class="header-nav-item">日付一覧</li>
        <li class="header-nav-item">ログアウト</li>
      </ul>
    </nav>
  </header>

<!-- main -->
<div class="main">
    <h1 class="date">
      <form action="{{route('attendance.other_day')}}" method="post">
      @csrf
      <!-- 見えないinputタグで$display-dateを渡す -->
      <input type="hidden" name="display-date" value="{{ $display-date }}">
      <button type="submit" name="select_day" value="back" class="date-change">＜</button>
      </form>
      {{$dispay-date}}
      <form action="{{route('attendance.other_day')}}" method="post">
      @csrf
      <!-- 見えないinputタグで$display_dateを渡す -->
      <input type="hidden" name="display_date" value="{{ $display_date }}">
      <button type="submit" name="select_day" value="next" class="date-change">＞</button>
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
      @foreach
      <tr>
        <td class="name">{{$user->name}}</td>
        <td>{{$work->start_time}}</td>
        <td>{{$work->end_time}}</td>
        <td></td>
        <td></td>
      </tr>
    </table>
  </div>

<!-- footer -->
<p class="footer-company">Atte,inc.</p>
