<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index()
    {
        $posts = Post::with('member:id,email,name')->latest()->get();

        return response()->json([
            'status' => true,
            'data' => $posts
        ]);
    }
}
