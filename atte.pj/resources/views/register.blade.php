@extends('layouts.auth')

@section('css')
<link rel="stylesheet" href="css/common.css" />
<link rel="stylesheet" href="css/register.css" />
@endsection

@section('title', 'register')

@section('main')
<div class="main regiter">
      <h1 class="message">会員登録</h1>

      <form action="{{ route('register.store' )}}" class="register-form" method="post">
        @csrf
        <input type="text" autocomplete="name" name="name" placeholder="名前" class="regiter-form-item"><br>
        <input type="email" autocomplete="email" name="email" placeholder="メールアドレス" class="regiter-form-item"><br>
        <input type="password" name="password" placeholder="パスワード" class="regiter-form-item"><br>
        <input type="password" name="password_confirmation" placeholder="確認用パスワード" class="regiter-form-item"><br>

        <button type="submit" class="member-regi-btn">会員登録</button>
        
        <p class="announce">アカウントをお持ちの方はこちらから</p>
        <div class="login">
          <a href="" class="login-a">ログイン</a>
        </div>
      </form>
</div>
@endsection

