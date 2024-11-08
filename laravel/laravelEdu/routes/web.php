<?php

use App\Http\Controllers\QueryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
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
    return view('welcome');
});

//최종적으로 html을 서버에 보이게 하는 역할

// ------------------
// 라우트 정의
// ------------------
Route::get('/hi', function() {
    return '안녕하세요 :)';
});

Route::get('/hello', function() {
    return 'hello';
});

Route::get('/myview', function() {
    return view('myView'); //myView.blade.php 의 함수명 가져오기
});

// ------------------
// httpMethod에 대응하는 라우터
// ------------------
Route::get('/home', function() {
    return view('home');
});

Route::post('/home', function() {
    return 'HOME POST';
});

Route::put('/home', function() {
    return 'HOME PUT';
});

Route::delete('/home', function() {
    return 'delete';
});

Route::patch('/home', function() { //php클로져?
    return 'PATCH';
});

// ------------------
// 파라미터 제어
// ------------------
Route::get('/param', function(Request $request) { //get이든 post든 $request안에 다 담김
    return 'ID : '.$request->id.' NAME : '.$request->name;
});
//http://localhost:8000/param?id=1&name=test

// 세그먼트 파라미터(url에 패스처럼 들어감)
//http://localhost:8000/param/1
Route::get('/param/{id}/{name}', function($id, $name) { //변수명과 파라미터 명이 동일
    return $id.' : ' .$name;
});


Route::get('/param/{id}', function(Request $request) {
    var_dump($request);
    exit;
    return $request->id;
});

Route::get('/param2/{id}', function(Request $request, $id) {
    return $request->id."    ".$id;
});

//  --------------------------------
// 세그먼트 파라미터의 디폴트 설정
//  --------------------------------
Route::get('param3/{id?}', function() {
    return '파람삼이다';
});
Route::get('param3/{id?}', function($id = 0) {
    return $id;
});

//  --------------------------------
// 라우트명 지정
//  --------------------------------
Route::get('param5/{name}', function(Request $request) {
    var_dump($request);
    exit;
    return $request->name; //이게 한번 해봤는데 안됨 ㅠㅠrequest안에 없엉 ㅠㅠ
});

Route::get('/name', function() {
    view('name');
});

Route::get('home/na/hon/php', function() {
    return '좀 긴 패스';
})->name('long');


//  --------------------------------
//뷰ㅇㅔ 데이터를 전달
//  --------------------------------
// Route::get('/send', function() {
//     return view('send')->with('gender', '무성');
// });

Route::get('/send', function() {
    $result = [
        ['id' =>1, 'name' => '홍길동']
        ,['id' =>2, 'name' => '임꺽정']
    ];
    var_dump($result);
    exit;
    return view('send')
    ->with('gender', '무성')
    ->with('data', $result);
    // return view('send')
    //     ->with([
    //         'gender' => '무성'
    //         ,'data' => $result
    //     ]);
});


// ---------------------
// 대체 라우트
// ---------------------
Route::fallback(function() {
    return '여기왜왔니';
});


//  --------------------------------
// 라우트 그룹
//  --------------------------------
Route::get('/users', function() {
    return 'GET : /users';
});

Route::post('/users', function() {
    return 'POST : /users';
});
Route::put('/users/{id}', function() {
    return 'PUT : /users';
});
Route::delete('/users/{id}', function() {
    return 'DELETE : /users';
});

// 위에 rounte를 묶음
Route::prefix('/users')->group(function() {
    Route::get('/', function() {
        return 'GET : /users';
    });
    Route::post('/', function() {
        return 'POST : /users';
    });
    Route::put('/{id}', function() {
        return 'PUT : /users';
    });
    Route::delete('/{id}', function() {
        return 'DELETE : /users';
    });
});


// -------------------------------------
// 컨트롤러 연결
// -------------------------------------
Route::get('/test', [TestController::class, 'index']);


// Route::get('/task', [TaskController::class, 'index']);
// Route::get('/task/create', [TaskController::class, 'create']);
// Route::post('/task', [TaskController::class, 'store']);
// Route::get('/task/{id}', [TaskController::class, 'show']);
// Route::get('/task/{id}/edit/', [TaskController::class, 'edit']);
// Route::put('/task/{id}', [TaskController::class, 'update']);
// Route::delete('/task/{id}', [TaskController::class, 'destroy']);

//only([]) : 사용할 액션 지정
// Route::resource('/task', TaskController::class)->only(['index', 'create',]);
//  인덱스와 크리에이트만 사용할때

//except([]) : 제외할 액션 지정
Route::resource('/task', TaskController::class)->except(['index', 'create',]);

// ---------------------------
// 블레이드 템플릿
//  ---------------------------
Route::get('/edu', function() {
    return view('edu')
            ->with('data', ['name' => '홍길동', 'id' => 54, 'content' => "<script>alert('hi')</script>"]);
});

Route::get('/boards', function() {
    return view('board');
});

Route::get('/extends', function() {
    $result = [
        ['id' =>1, 'name' => '홍길동', 'gender' => 'C']
        ,['id' =>2, 'name' => '임꺽정', 'gender' => 'M']
        ,['id' =>3, 'name' => '갑순이', 'gender' => 'F']
    ];

    return view('extends')
            ->with('data', $result)
            ->with('data2', []);
});

// ---------------------------
// 쿼리빌더 연습용
// ---------------------------
Route::get('/query', [QueryController::class, 'index']);

