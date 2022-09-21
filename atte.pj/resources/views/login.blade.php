@extends('layouts.auth')

@section('css')
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/login.css" />
@endsection

@section('main')

<!-- main -->
<div class="main">
  <h1 class="message">ログイン</h1>
  <form action="{{route('login.store')}}" class="login-form" method="post">
    @csrf
    <input type="email" autocomplete="email" name="email" placeholder="メールアドレス" ><br>
    <input type="password" name="password" placeholder="パスワード">
    <button type="submit" class="login-btn">ログイン</button>
    <p class="announce">アカウントをお持ちでない方はこちらから</p>
    <div class="member-regi"><a href="/register" class="member-regi-a">会員登録</a></div>
  </form>
</div>

@endsection