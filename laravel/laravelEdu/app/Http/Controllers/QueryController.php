<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QueryController extends Controller
{
    public function index(Request $request) {
        // ------------
        // 쿼리 빌더 : 좀더 간결하고 직관적임
        // -------------

        // 1. 쿼리빌더 이용하지 않고 SQl 작성하기
        $result = DB::select('select * from users');
        $result = DB::select('select * from users where u_email = :u_email', ['u_email' => 'admin@admin.com']);
        $result = DB::select('select * from users where u_email = ?', ['admin@admin.com']);

        
        
        //insert
        // DB::insert('INSERT INTO board_category (bc_type, bc_name) VALUES(?, ?)', ['2', '테스트게시판']);
        
        //update
        // DB::update('UPDATE board_category SET bc_name = ? WHERE bc_type = ?', ['미어캣게시판', '2']);

        //delete
        DB::delete('DELETE FROM board_category WHERE bc_type = ?', ['2']);

        // -----------------
        // 쿼리 빌더 체이닝
        // -----------------
        // users 테이블 모든 데이터 조회
        // select *  from users;
        $result = DB::table('users')->get();
        
        //select * from users where name = ? ['u_name' => '테스트']
        $result = DB::table('users')->where('u_name', '=', '테스트')->get();

        //select * from boards where bc_type = ? and b_id < ? ['0', 5]
        $result = DB::table('boards')
                    ->where('bc_type', '=', '0')
                    ->where('b_id', '<', 5);
                    // ->get();

        //select * from boards where bc_type = ? or b_id < ? ['0', 10]
        // $result = DB::table('boards')
        //             ->where('bc_type', '=', '0')
        //             ->orwhere('b_id', '<', 10);
                    // ->get();


        //select b_title, b_content from boards where b_id in (?, ?) [1 ,2]
        $result = DB::table('boards')
                    ->select('b_title', 'b_content')
                    ->whereIN('b_id', [1, 2])
                    ->get();

        //select * from boards where u_deleted_at is null
        $result = DB::table('boards')
                    ->whereNull('u_deleted_at')
                    ->get();
        
        //select * from boards where year(u_created_at) = 2024;
        //index 사용이 어려움 -> 속도 문제가 발생
        $result = DB::table('users')
                    ->whereyear('u_created_at', '=', '2024')
                    ->get();

        //select by_type,count(*) cnt from boards group by bc_type
        $result = DB::table('boards')
                    ->select('bc_type', DB::raw('COUNT(*) cnt')) //마리아 db에서 제공하는 함수를 그대로 사용하고 싶을때
                    // ->count('b_title')
                    ->groupBy('bc_type')
                    ->get();

        //select by_type,count(*) cnt from boards group by bc_type having bc_type = '0'
        $result = DB::table('boards')
                    ->select('bc_type', DB::raw('COUNT(*) cnt')) 
                    ->groupBy('bc_type')
                    ->having('bc_type', '=', '0')
                    ->get();

        //select b_id, b_title from boards order by b_id limit ? offset ? [1,2]
        $result = DB::table('boards')
                    ->select('b_id', 'b_title')
                    ->orderBy('b_id')
                    ->limit('1')
                    ->offset('2')
                    ->get();

        //동적 쿼리
        $requestData = [
            'u_id' => 1
        ];
        //null, false, 0 , []일 경우 when 조건이 실행되지 않는다.
        $result = DB::table('users')
                    ->when($requestData['u_id'], function($query, $u_id) {
                        $query->where('u_id', '=', $u_id);
                    })
                    ->get();

        //삭제 되지 않은 글 중 제목에 자유 또는 질문이 포횜되어 있는 게시글 검색
        $result = DB::table('boards')
                    ->whereNull('u_deleted_at')
                    ->where(function($query) {
                        $query->where('b_title', 'like', '%자유%')
                                ->orWhere('b_title', 'like', '%질문%');
                    })
                    ->get();

        //first() : 쿼리 결과 중에 첫번째 레코드만 반환
        $result = DB::table('users')->first();


        //find($id) : 지정된 pk에 해당하는 레코드를 반환
        //지금 우리는 못쓴다 -> 왜인지 모름 ㅎㅎ
        // $result = DB::table('users')->find(1);

        //count() : 쿼리 결과의 레코드 수를 반환
        $result = DB::table('users')->count();


        //insert
        // $result = DB::table('users')
        //             ->insert([
        //                 'u_email' => 'abc@admin.com'
        //                 ,'u_password' => Hash::make('qwer1234')
        //                 ,'u_name' => '김영희'
        //             ]);

        // //배열로 하고 싶으면 하면됨 ㅎㅎ
        // $arr = [
        //     'u_email' => 'abc@admin.com'
        //     ,'u_password' => Hash::make('qwer1234')
        //     ,'u_name' => '김영희'
        // ];

        // $result = DB::table('users'
        //             )->insert($arr);

        // //update
        // $result = DB::table('users')
        //             ->where('u_id', '=', 5) //where 무조건
        //             ->update([ 
        //                 'u_name' => '김철수'
        //             ]);


        //delete
        // $result = DB::table('users')
        //             ->where('u_id', '=', 5)
        //             ->delete();

        
        //-----------------------
        //Eloquent Model
        //-----------------------
        $result = User::get();
        //r굳이 진행 안해줘도됨
        $result = User::find(2);

        //insert
        // $data = DB::table('users')
        //             ->insert([
        //                 'u_email' => 'abc@admin.com'
        //                 ,'u_password' => Hash::make('qwer1234')
        //                 ,'u_name' => '김영희'
        //             ]);

        $userInsert = new User();
        $userInsert->u_email = $request->u_email;
        $userInsert->u_password = $request->u_password;
        $userInsert->u_name = $request->u_name;
        // $userInsert->save();




        //update
        // $userUpdate = User::find(8);
        // $userUpdate->u_name = '김해영';
        // $userUpdate->save();


        //delete
        // $userDelete = User::destroy(8);


        //삭제된 데이터도 포함해서 검색하고 싶을때
        $result = User::withTrashed()->get();


        // //삭제된 데이터만 검색하고 싶을때
        $result = User::onlyTrashed()->get();


        // //삭제된 데이터를 되살리고 싶을때
        $result = User::where('u_id', 8)->restore(); // '=' 생략가능

        var_dump($result);
        return '';
    }
}

