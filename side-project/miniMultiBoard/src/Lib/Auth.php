<?php

//인증과 인가에 대한 처리 담당
namespace Lib;
class Auth {
    
    
    public static function chkAuthorization () {
        //비로그인시 접속 불가능한 리스트
        $arrNeedAuth = [
            'boards'
            ,'boards/detail'
            ,'logout'
            ,'boards/insert'
        ];
        $url = $_GET['url'];

        //접속 권한이 없는 페이지 접속 차단(로그인 페이지로 이동)
        if(!isset($_SESSION['u_email']) && in_array($url, $arrNeedAuth)) {
            header('Location: /login'); //로그인이 안되어 있을때 로그인창으로 이동
            exit;
        }

        //로그인한 상태에서 로그인 페이지 접속 시 자유게시판(/board)으로 이동
        //     if(isset($_SESSION['u_email']) && ($url === 'login' || $url === 'regist')) {
        //         header('Location: /boards');
        //         exit;
        //     }
        // }
        if(isset($_SESSION['u_email']) && !in_array($url, $arrNeedAuth)) {
            header('Location: /boards');
            exit;
        }
    }
}