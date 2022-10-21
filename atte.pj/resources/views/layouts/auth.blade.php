<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    @yield('css')
    <title>Atte - @yield('title')</title>
    <meta name="description" content="Atteは勤怠管理システムです">
</head>

<body class="container">
    <!-- header -->
    <header class="header">
        <h1 class="header-ttl">Atte</h1>
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