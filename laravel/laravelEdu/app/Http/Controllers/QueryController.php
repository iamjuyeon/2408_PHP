<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function index() {
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
        



        var_dump($result);
        return '';
    }
}

