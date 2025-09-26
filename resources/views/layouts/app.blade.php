<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Member Page')</title>
    <link rel="stylesheet" href="{{ asset('css/member.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
