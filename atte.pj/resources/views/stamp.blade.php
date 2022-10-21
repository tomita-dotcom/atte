@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/stamp.css" />
@endsection

@section('title', 'stamp')

@section('main')
<div class="main stamp">
  <h1 class="message">{{ Auth::user()->name }}さん　お疲れ様です！</h1>
  
  <div class="stamp-list"> 

    <form action="{{ route('work.start') }}" method="post">
      @if(!isset($work))
      @csrf
      <button class="btn start-work-btn" type="submit" value="strat-work" >勤務開始</button>
      @else
      <p class="attendance-btn inactive">勤務開始</p>
      @endif
    </form>

    <form action="{{ route('work.end') }}" method="post">
      @csrf
      <button class="btn" type="" value="end-work" class="btn">勤務終了</button>
    </form>

    <form action="{{ route('rest.start' )}}" method="post">
      @csrf
      <button class="btn" type="submit" value="strat-rest" >休憩開始</button>
    </form>

    <form action="{{ route('rest.end') }}" method="post">
      @csrf
      <button  class="btn" type="submit" value="rest-end">休憩終了</button>
    </form>

  </div>
</div>
@endsection