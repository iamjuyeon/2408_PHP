<?php

namespace Lib;

Class UserValidator {
    public static function chkValidator(array $date) {
        $arrErrorMsg = [];
    
        //패턴생성
        $patternEmail = "/^[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}@[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}\.[a-zA-Z]{2,3}$/u";
        $patternPassword = "/^[a-zA-Z0-9!@]{8,20}$/u"; //8글자에서 20글자 제한
        $patternName = "/^[가-힣]{1,50}$/u"; //가 : 한글 첫 글자, 힣: 한글 끝 글자 1~50글자 제한

        //이메일 체크
        if(array_key_exists('u_email', $date)) {
            if(preg_match($patternEmail, $date['u_email'], $match) === 0) {
                $arrErrorMsg[]= '이메일 형식이 맞지 않습니다';
            }
        }
        //패스워트 체크
        if(array_key_exists('u_password', $date)) {
            if(preg_match($patternPassword, $date['u_password'], $match) === 0) {
                $arrErrorMsg[]= '비밀번호는 영어 대소문자 및 숫자, 특수문자(!,@) 8~20자로 작성해주세요';
            }
        }

        //패스워드 확인 체크
        if(array_key_exists('u_password_chk', $date)) {
            if($date['u_password'] !== $date['u_password_chk']) {
                $arrErrorMsg[]= '비밀번호와 비밀번호 확인이 다릅니다';
            }
        }

        //이름 체크
        if(array_key_exists('u_name', $date)) {
            if(preg_match($patternName, $date['u_name'], $match) === 0) {
                $arrErrorMsg[]= '이름은 한글만 입력해 주세요';
            }
        }

    return $arrErrorMsg;
    } 
}