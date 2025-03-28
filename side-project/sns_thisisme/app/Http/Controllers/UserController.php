<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function store(UserRequest $request) {
        //insert data 생성
        $insertData = $request->only('account', 'name', 'gender');
        $insertData['password'] = Hash::make($request->password);
        $insertData['profile'] = '/'.$request->file('profile')->store('profile');

        //user insert 처리
        User::create($insertData);

        //response데이터
        $responseData = [
            'success' => true
            ,'msg' => '회원가입 성공'
        ];
        return response()->json($responseData, 200);
    } 
}
