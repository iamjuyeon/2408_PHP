<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//로그인 처리
Route::post('/login', [AuthController::class, 'login'])->name('post.login');

Route::middleware('my.auth')->group(function() {
    // 인증 관련
    Route::post('/logout', [AuthController::class, 'logout'])->name('post.logout');

    // 게시판 관련
    Route::get('/boards', [BoardController::class, 'index'])->name('get.index');
    Route::get('/boards/{id}', [BoardController::class, 'show'])->name('get.show');
    Route::post('/boards', [BoardController::class, 'store'])->name('boards.store');
});

Route::post('registration', [UserController::class, 'store'])->name('user.store');