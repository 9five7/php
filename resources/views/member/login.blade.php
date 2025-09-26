<h2>Member Login</h2>
<form method="POST" action="{{ route('member.login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Đăng nhập</button>
</form>
