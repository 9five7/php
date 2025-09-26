<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/posts', [PostApiController::class, 'index']);


});

Route::post('/member/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::guard('member')->attempt($credentials)) {
        return response()->json(['message' => 'Sai thông tin đăng nhập'], 401);
    }

    $member = Auth::guard('member')->user();

    // Tạo token
    $token = $member->createToken('member-token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'member' => $member,
    ]);
});
