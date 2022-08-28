@extends('layouts.app')

@section('main')
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/register.css" />

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
  <h1 class="message">会員登録</h1>
  <form action="{{route('register.store')}}" class="register-form" method="post">
    @csrf
    <input type="name" autocomplete="name" name="name" placeholder="名前"><br>
    <input type="email" autocomplete="email" name="email" placeholder="メールアドレス"><br>
    <input type="password" name="password" placeholder="パスワード"><br>
    <input type="password" name="password" placeholder="確認用パスワード"><br>
    <button type="submit" class="member-regi-btn">会員登録</button>
    <p class="announce">アカウントをお持ちの方はこちらから</p>
    <div class="login"><a href="" class="login-a">ログイン</a></div>
  </form>
</div>

<!-- footer -->
<p class="footer-company">Atte,inc.</p>

