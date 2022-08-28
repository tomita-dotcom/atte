@extends('layouts.app')

@section('main')
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/login.css" />

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
  <h1 class="message">ログイン</h1>
  <form action="{{route('authenticated.store')}}" class="login-form" method="post">
    @csrf
    <input type="email" autocomplete="email" name="email" placeholder="メールアドレス" ><br>
    <input type="password" name="password" placeholder="パスワード">
    <button type="submit" class="login-btn">ログイン</button>
    <p class="announce">アカウントをお持ちでない方はこちらから</p>
    <div class="member-regi"><a href="/register" class="member-regi-a">会員登録</a></div>
  </form>
</div>

<!-- footer -->
<p class="footer-company">Atte,inc.</p>