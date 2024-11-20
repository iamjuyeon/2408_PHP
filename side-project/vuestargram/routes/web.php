<?php

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
//어떠한 path로 들어오더라도 welcome페이지로 이동
//라라벨 라우트
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
