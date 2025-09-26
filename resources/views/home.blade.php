<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Trang chủ</h1>

    @auth
        <p>Xin chào, {{ Auth::user()->name }} 🎉</p>
        <a href="{{ url('/admin/dashboard') }}">Vào Dashboard</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit">Đăng xuất</button>
        </form>
    @else
        <a href="{{ route('login') }}">Đăng nhập</a> |
        <a href="{{ route('register') }}">Đăng ký</a>
    @endauth
</body>
</html>
