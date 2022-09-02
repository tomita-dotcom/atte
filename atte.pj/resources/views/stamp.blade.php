@extends('layouts.app')

@section('main')
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/stamp.css" />

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
  <h1 class="message">{{User::user()->name}}さん　お疲れ様です！</h1>
  <div class="stamp-list">
    <form action="{{route('work.start')}}" method="post">
      @csrf
      <button type="submit" value="stra-twork" class="btn">勤務開始</button>
    </form>
    <form action="{{route('work.end')}}" method="post">
      @csrf
      <button type="" value="end-work" class="btn">勤務終了</button>
    </form>
    <form action="{{route('rest.start')}}" method="post">
      @csrf
      <button type="submit" value="strat-rest" class="btn">休憩開始</button>
    </form>
    <form action="{{route('rest.start')}}" method="post">
      @csrf
      <button type="submit" value="rest-end" class="btn">休憩終了</button>
    </form>
  </div>
</div>

<!-- footer -->
<p class="footer-company">Atte,inc.</p>
@endsection