<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostApiController extends Controller
{
    public function index(Request $request)
    {
        $member = $request->user(); 

        $posts = Post::with('member:id,email,name')
                    ->where('member_id', $member->id)
                    ->latest()
                    ->get();

        return response()->json([
            'status' => true,
            'data' => $posts
        ]);
    }
}
