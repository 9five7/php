<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class MemberAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('member.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('member')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('member.profile');
        }

        return back()->withErrors([
            'email' => 'Sai email hoặc mật khẩu.',
        ]);
    }
    public function showRegisterForm()
    {
        return view('member.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'memberid' => 'required|unique:members|min:6,memberid',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'password' => 'required|min:6|confirmed',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('members', 'public');
        }

        $member = Member::create([
            'memberid' => $validated['memberid'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'avatar' => $path,
        ]);

        Auth::guard('member')->login($member);

        return redirect()->route('member.profile')->with('success', 'Đăng ký thành công!');
    }

    public function logout(Request $request)
    {
        Auth::guard('member')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('member.login');
    }
}
