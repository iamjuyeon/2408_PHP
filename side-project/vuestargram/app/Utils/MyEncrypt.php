<?php
namespace App\Utils;

use Illuminate\Support\Str;

class MyEncrypt {
    // base 64 url 인코드
    // @param string $json
    //@return string base64 Url Encode

    public function base64UrlEncode(string $json) {
        return rtrim(strtr(base64_encode($json), '+/', '-_'), '=');
    }

    //base64 URL 디코드
    //@param string $base64 base64 URL encode
    //@return string $json
    public function base64UrlDecode(string $base64) {
        //역순으로 진행
        return base64_decode(strtr($base64, '-_','+/')); 
    }



    //특정길이만큼 랜덤한 문자열 생성 : salt 생성
    //@param int $saltLength
    //@return string 랜덤 문자열

    public function makeSalt($saltLength) {
        return Str::random($saltLength); //str : string 작업을 해주는 객체?
    } 

    //암호화 처리하는 메소드 만들기
    //@param string $alg 알리리즘 명
    //@param string $str 암호화할 문자열을 받음
    //@param string $salt 솔트
    //@return string 암호화 된 문자열을 반환

    //외부에서 접속이 가능해야함
    public function hashWithSalt(string $alg, string $str, string $salt) {
        return hash($alg, $str).$salt; //복구화 해도 salt 땜에 안됨/ salt의 위치는 변경 가능
        
    }

    //특정 길이의 솔트를 제거한 문자열 반환
    //@param string $signature 솔트 포함된 시그니쳐
    //@param int $saltlength 솔트 길이
    //@return string 솔트 제거한 문자열

    public function subSalt(string $signature, int $saltlength) {
        return mb_substr($signature, 0, (-1 * $saltlength));
    }
}