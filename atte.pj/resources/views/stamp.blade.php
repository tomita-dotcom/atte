@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/stamp.css" />
@endsection

@section('main')

<!-- main -->
<div class="main">
  
  <h1 class="message">{{Auth::user()->name}}さん　お疲れ様です！</h1>
  
  <div class="stamp-list">
    <form action="{{route('work.start')}}" method="post">
      @csrf
      <button type="submit" value="strat-work" class="btn start-work-btn">勤務開始</button>
    </form>
    <form action="{{route('work.end')}}" method="post">
      @csrf
      <button type="" value="end-work" class="btn">勤務終了</button>
    </form>
    <form action="{{route('rest.start')}}" method="post">
      @csrf
      <button type="submit" value="strat-rest" class="btn">休憩開始</button>
    </form>
    <form action="{{route('rest.end')}}" method="post">
      @csrf
      <button type="submit" value="rest-end" class="btn">休憩終了</button>
    </form>
  </div>
</div>


@endsection