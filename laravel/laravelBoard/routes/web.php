<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('goLogin');
});
//로그인 관련
Route::middleware('guest')->get('/login', [UserController::class, 'goLogin'])->name('goLogin');
Route::middleware('guest')->post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//게시판 관련
//로그인 여부가 중요한 곳 -> middleware처리
Route::middleware('auth')->resource('/boards', BoardController::class)->except(['update', 'edit']);

//회원가입 관련
// Route::get('/resist', [UserController::class, 'goResist'])->name('goResist');
// Route::post('/resist', [UserController::class, 'resist'])->name('resist');

//선생님
Route::middleware('guest')->get('/registration', [UserController::class, 'registration'])->name('get.registration');
Route::middleware('guest')->post('/registraion', [UserController::class, 'storeRegistraion'])->name('post.registration');

//입력 게시판
//입력 게시판 이동
// Route::get('/insert', function () {
//     return '게시판 연결 어떻게 하냐';
//     // return redirect()->route('insert');
// });

// Route::get('/insertment', [UserController::class, 'insert'])->name('insert');
// Route::post('/inset', [UserController::class, 'insert'])->name('post.insert');
// Route::get('/insert/{bc_type}', [BoardController::class])
// Route::get('')
// Route::get('/insert/bc_type/', [BoardController::class])->name('insert');

//입력 게시판
// Route::resource('/boards/create', BoardController::class)->except(['update', 'edit']);



