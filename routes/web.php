<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MemberAuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberPostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/home', function () {
    return view('home');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/forgot-password', [AuthController::class, 'showQuickResetForm'])->name('password.quick');
Route::post('/forgot-password', [AuthController::class, 'quickResetPassword'])->name('password.quick.update');
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/posts', PostController::class);
    Route::resource('/settings', SettingController::class)->only(['index', 'update']);
});
Route::prefix('member')->name('member.')->group(function () {
    Route::get('/login', [MemberAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [MemberAuthController::class, 'login']);
    Route::post('/logout', [MemberAuthController::class, 'logout'])->name('logout');
    Route::get('/register', [MemberAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [MemberAuthController::class, 'register']);
    Route::middleware('auth:member')->group(function () {
        Route::get('/profile', [MemberController::class, 'profile'])->name('profile');
        Route::post('/profile', [MemberController::class, 'updateProfile'])->name('profile.update');
        Route::get('/posts', [MemberPostController::class, 'index'])->name('posts.index');
    });
});
