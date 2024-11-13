<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function goLogin() {
        return view('login');//blade템플릿으로 이동(blade.php 이름 적으면 됨)
        
    }


    //****로그인 처리******
    public function login(Request $request) {
        //유효성 체크
        $validator = Validator::make(
            $request -> only('u_email', 'u_password') //request에 해당하는 키들을 연관배열로 가져옴
            ,[
                'u_email' => ['required', 'email', 'exists:users,u_email'] //필수로 체크
                ,'u_password' => ['required', 'between:6,16', 'regex:/^[a-zA-Z0-9!@]+$/'] //비밀번호 최소 6글자, 최대 16
            ]
        );

        if($validator->fails()) { //실패했는지 안했는지 확인하는 method, 실패하면 -> true 반환
            return redirect()
                    ->route('goLogin')
                    ->withErrors($validator->errors()); //로그인 실패하면 에러메세지와 함께 
        }


        //회원정보 획득
        $userInfo = User::where('u_email', '=', $request->u_email)->first();

        //비밀번호 체크
        if(!(Hash::check($request->u_password, $userInfo->u_password))) {
            return redirect() -> route('goLogin')->withErrors('비밀번호가 일치하지 않습니다');
        }

        //유저 인증 처리
        Auth::login($userInfo);
        // var_dump(Auth::id()); // 로그인한 유저의 pk를 획득
        // var_dump(Auth::user()); // 로그인한 유저의 정보를 획득
        // var_dump(Auth::check()); // 로그인 여부 확인  login 되어 있으면 true

        return redirect()->route('boards.index');
    }

    //로그아웃 처리
    public function logout() {
        Auth::logout(); //로그아웃 처리

        Session::invalidate(); //기존의 세션의 모든 데이터를 제거 및 새로운 세션 ID 발급
        Session::regenerateToken(); //CSRF 토근 재발급

        return redirect()->route('goLogin');

    }

}
