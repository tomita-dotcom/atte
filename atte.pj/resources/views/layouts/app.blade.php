<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    @yield('css')
    <title>Contact Form</title>
</head>

<body class="container">
    <!-- header -->
    <header class="header">
        <h1 class="header-ttl"> Atte</h1>
        <nav class="header-nav">
            <ul class="header-nav-list">
                <li  class="header-nav-item">
                    <form action="{{ route('stamp') }}" method="get">
                        @csrf
                        <button class="logout-btn">ホーム</button>
                    </form>
                </li>
                <li class="header-nav-item">
                    <form action="{{ route('attendance.attendance') }}" method="get">
                        @csrf
                        <button class="logout-btn">日付一覧</button>
                    </form>
                <li class="header-nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="logout-btn">ログアウト</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <!-- end・header -->

    <!-- main -->
    <main class="main">@yield('main')</main>
    <!-- end・main -->

    <!-- footer -->
    <p class="footer-company">Atte,inc.</p>
    <!-- end・footer -->

</body>
</html>