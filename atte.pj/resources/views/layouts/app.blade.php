<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <title>Contact Form</title>
</head>

<body class="container">
    <main class="main">
        @yield('main')
    </main>
</body>
</html>