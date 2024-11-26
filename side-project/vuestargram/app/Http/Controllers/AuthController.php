<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use MyToken;


class AuthController extends Controller
{
    public function login(UserRequest $request) {
        //유저 정보 획득
        // $userInfo = User::where('account', $request->account)->first();

        $userInfo = User::where('account', $request->account)
                    ->withCount('boards')
                    ->first(); 
        
        
        //비밀번호 체크
        if(!(Hash::check($request->password, $userInfo->password))) {
            throw new AuthenticationException('비밀번호 체크 오류');
        }

        
        //토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($userInfo);

        // refresh 토근 저장
        MyToken::updateRefreshToken($userInfo, $refreshToken);

        $responseData = [
            'success' => true
            ,'msg' => '로그인 성공'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
            ,'data' => $userInfo->toArray()
        ];
        
        return response()->json($responseData, 200);
    }

    //+-------------------+
    //+     로그 아웃      +
    //+-------------------+
    //@param Illuminate\Http\Request
    //@param response JSON
    public function logout(Request $request) {
        // return $request->bearerToken();

        // payload에서 유저 아이디 획득
        $id = MyToken::getValueInpayload($request->bearerToken(), 'idt');

        DB::beginTransaction();

        //유저 정보 획득
        $userInfo = User::find($id);

        //리프레쉬 토큰 갱신
        MyToken::updateRefreshToken($userInfo, null);

        DB::commit();
        
        $responseData = [
            'success' => true
            ,'msg' => '로그아웃 성공'
        ];
        

        return response()->json($responseData, 200);
    }
}
