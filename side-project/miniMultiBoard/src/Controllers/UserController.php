<?php
//AuthController : 자식 클래스

namespace Controllers;

use controllers\Controller;
use Lib\UserValidator;
use Models\User;

//requir_once 사용안함

class UserController extends Controller {
    protected $userInfo = [
        'u_email' => ''
        ,'u_name' => ''
    ];
    protected function goLogin() {
        return 'login.php';
    } 
    protected function login() {
        //유저 입력 정보를 획득
        $requestDate = [
            'u_email' => $_POST['u_email']
            ,'u_password' => $_POST['u_password']
        ];

        //유효성 체크
        $resultValidator= UserValidator::chkValidator($requestDate);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return 'login.php';
        }
        
        //유저정보를 획득
        //id로 먼저 획득
        $userModel = new User();
        $prepare = [
            'u_email' => $requestDate['u_email']
        ];

        $resultUserInfo = $userModel->getUserInfo($prepare);


        //유저 존재 유무 체크
        if(!$resultUserInfo) {
            $this->arrErrorMsg[] = '존재하지 않는 사용자 입니다';
        } else if(!password_verify($requestDate['u_password'], $resultUserInfo['u_password'])) {
            //패스워드 확인(유저의 패스워드 - 데이터베이스의 패스워드)            
            $this->arrErrorMsg[]= '패스워드가 일치하지 않습니다';
            return 'login.php';
        }

        // //비밀번호 암호화
        // $encryptPassword = password_hash($requestDate['u_password'], PASSWORD_DEFAULT);
        

        //세션에 u_id 저장
        $_SESSION['u_email'] = $resultUserInfo['u_email'];


        //로케이션 처리
        return 'Location: /boards';
    }

        //로그아웃
    public function logout() {        
        unset($_SESSION['u_email']); //유저 이메일 제거
        session_destroy(); //세션 파기
        return 'Location: /login';
    }

    public function goRegist() {
        return 'regist.php';
    }

        //회원가입 처리
    public function regist() {
        $requestDate = [
            'u_email' => isset($_POST['u_email']) ? $_POST['u_email'] : ''
            ,'u_password' => isset($_POST['u_password']) ? $_POST['u_password'] : ''
            ,'u_password_chk' => isset($_POST['u_password_chk']) ? $_POST['u_password_chk'] : ''
            ,'u_name' => isset($_POST['u_name']) ? $_POST['u_name'] : ''
        ];

        $this->userInfo = [
            'u_email' => $requestDate['u_email']
            ,'u_name' => $requestDate['u_name']
        ];
         //유효성 체크
        $resultValidator = UserValidator::chkValidator($requestDate);  
            if(count($resultValidator) > 0) {
                $this->arrErrorMsg = $resultValidator;
                return 'regist.php';
            }
        
        //이메일 중복 체크
        $userModel = new User();
        $prepare = [
            'u_email' => $requestDate['u_email']
        ];
        $resultUserInfo = $userModel->getUserInfo($prepare);
        if($resultUserInfo) {
            $this->arrErrorMsg[] = '이미 가입된 이메일입니다.';
                return 'regist.php';
            }

        //회원정보 인서트
        $userModel->beginTrasaction();
        $prepare = [
            'u_email' => $requestDate['u_email']
            ,'u_password' => password_hash($requestDate['u_password'], PASSWORD_DEFAULT)
            ,'u_name' => $requestDate['u_name']
        ];
        $resultRegistUserInfo = $userModel->registUserInfo($prepare);
        if($resultRegistUserInfo !== 1) {
            $userModel->rollback();
            $this->arrErrorMsg[] = '회원가입에 실패했습니다.';
            return 'regist.php';
        }

        $userModel->commit();
        return 'Location: /login';
    }
};