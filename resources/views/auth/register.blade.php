<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Đăng ký</h2>
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <label>Họ và tên:</label>
        <input type="text" name="name" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <label>Xác nhận Password:</label>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Đăng ký</button>
    </form>

</body>
</html>
