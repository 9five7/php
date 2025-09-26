<h2>Member Register</h2>

<form action="{{ route('member.register') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Member ID</label>
        <input type="text" name="memberid" value="{{ old('memberid') }}">
        @error('memberid') <span style="color:red">{{ $message }}</span> @enderror
    </div>

    <div>
        <label>Tên</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <span style="color:red">{{ $message }}</span> @enderror
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <span style="color:red">{{ $message }}</span> @enderror
    </div>

    <div>
        <label>Mật khẩu</label>
        <input type="password" name="password">
        @error('password') <span style="color:red">{{ $message }}</span> @enderror
    </div>

    <div>
        <label>Xác nhận mật khẩu</label>
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <label>Avatar</label>
        <input type="file" name="avatar">
        @error('avatar') <span style="color:red">{{ $message }}</span> @enderror
    </div>

    <button type="submit">Đăng ký</button>
</form>

<p>Bạn đã có tài khoản? <a href="{{ route('member.login') }}">Đăng nhập</a></p>
