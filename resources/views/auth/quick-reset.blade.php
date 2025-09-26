<!DOCTYPE html>
<html>
<head>
    <title>Đổi mật khẩu nhanh</title>
</head>
<body>
    <h2>Quên mật khẩu - Đặt lại nhanh</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <p style="color:green;">{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('password.quick.update') }}">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Mật khẩu mới:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Xác nhận mật khẩu:</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Đổi mật khẩu</button>
    </form>
</body>
</html>
