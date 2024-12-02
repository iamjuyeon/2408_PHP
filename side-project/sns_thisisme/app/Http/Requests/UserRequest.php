<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    public function rules()
    {

        $rules = [
            'account' => ['required', 'between:5,20', 'regex:/^[0-9a-zA-Z]+$/']
            ,'password' => ['required', 'between:5,20', 'regex:/^[0-9a-zA-Z]+$/']
        ];
        //로그인시 아이디 여부 확인
        if($this->routeIs('auth.login')) {
            $rules['account'][] = 'exists:users,account';
        }
        return $rules;
    }

    //유효성 확인
    protected function failedValidation(Validator $validator)
    {
        //json 형태로 만들어주기
        $response = response()->json([
            'success' => false,
            'message' => '유효성 체크 오류', 
            'data' => $validator->errors()
        ], 422); //422 유효성체크에서 오류가 발생했을 때 보내주는 코드
        //400 번대 : 유저가 보내온 request가 문제가 있을때 
        throw new HttpResponseException($response);//json 형태로 
    }
}