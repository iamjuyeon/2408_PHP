<?php
//controller : 부모 클래스, 중계역할만 한다

namespace Controllers;

use Models\BoardCategory;
use Lib\Auth;


class Controller {
    protected $arrErrorMsg = []; //화면에 표시할 에러 메세지 리스트
    protected $arrBoardNameInfo = []; // 헤더 게시판 드롭다운 리스트

    public function __construct(string $action) {
        //세션 시작 처리
        if(session_status() === PHP_SESSION_NONE) {
            //세션 실행 안됨 = 1 , 실행가고 있으면 = 2
            session_start();
        }
        //유저 로그인 및 권한 체크
        Auth::chkAuthorization();

        //헤더 드롭다운 리스트 획득
        $boardsCategoryModel = new BoardCategory(); 
        $this->arrBoardNameInfo = $boardsCategoryModel->getBoardsNameList();


        //해당 action 호출 -> 페이지 이동 처리
        //해당 controller 의 method
        $resultAction = $this->$action();
        // echo $resultAction;

        
        //view 호출
        $this->callView($resultAction);

        //php종료
        exit;
    }
    // 뷰 또는 로케이션 처리용 메소드
    private function callView($path) {
        if(strpos($path, 'Location:') === 0) {
            header($path);

        } else {
            require_once(_PATH_VIEW.'/'.$path);
        }
    }
}