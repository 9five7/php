<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class MemberPostController extends Controller
{
    public function index()
    {
        $member = Auth::guard('member')->user();

        $posts = Post::where('member_id', $member->id)
                     ->latest()
                     ->paginate(10);

        return view('member.posts.index', compact('posts', 'member'));
    }
}

