<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoardController;
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

//토큰 인증 방식 이용
// path : /api/login
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

//로그아웃 처리
// Route::middleware('my.auth')->post('/logout', [AuthController::class, 'logout'])->name('post.logout');

//라우트 그룹 : 인증이 필요함
//하나만 적어줘도 다 처리하도록 가능
Route::middleware('my.auth')->group(function() {
    // 인증 관련
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // 게시판 관련
    Route::get('/boards', [BoardController::class, 'index'])->name('boards.index');
    Route::get('/boards/{id}', [BoardController::class, 'show'])->name('boards.show');
    Route::post('/boards', [BoardController::class, 'store'])->name('boards.store');
});
