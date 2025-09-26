<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function profile()
    {
        $member = Auth::guard('member')->user();
        return view('member.profile', compact('member'));
    }

    public function updateProfile(Request $request)
    {
        $member = Auth::guard('member')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8048',
        ]);

        $member->name = $request->name;

        if ($request->hasFile('avatar')) {
            if ($member->avatar && Storage::disk('public')->exists($member->avatar)) {
        Storage::disk('public')->delete($member->avatar);
    }
            $path = $request->file('avatar')->store('members', 'public');
            $member->avatar = $path;
        }

        $member->save();

        return redirect()->route('member.profile')->with('success', 'Cập nhật thành công!');
    }
}
