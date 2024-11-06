<?php

namespace Controllers;

use Controllers\Controller;
use Models\Board;
use Models\BoardCategory;

class BoardController extends Controller {
    private $arrBoardList = [];//게시글 정보 리스트
    private $boardName = '';//게시판 이름
    protected $boardType = ''; //게시판 코드


    //getter
    public function getArrBoardList() {
        return $this->arrBoardList;
    }

    //getter 자유게시판, 질문 게시판 선택하기
    public function getBoardName() {
        return $this->boardName;
    }

    //setter
    public function setArrBoardList($arrBoardList) {
        $this->arrBoardList = $arrBoardList;
    }

    //setter 자유게시판, 질문 게시판 선택하기
    public function setBoardName($boardName) {
        $this->boardName = $boardName;
    }

    public function index() {
        //보드 타입 획득
        $requestDate = [
            'bc_type' => isset($_GET['bc_type']) ? $_GET['bc_type'] : '0'
        ];
        $this->boardType = $requestDate['bc_type'];

        //게시글 정보 획득
        $boardModel = new Board();
        $this->setArrBoardList($boardModel->getBoardList($requestDate));


        //보드 이름 획득
        $boardCategoryModel = new BoardCategory();
        $resultBoardCategory = $boardCategoryModel->getBoardName($requestDate);
        $this->setBoardName($resultBoardCategory['bc_name']);

        return 'board.php';
    }

        //상세 페이지
        public function show() {
            $requestDate = [
                'b_id' => $_GET['b_id']
            ];

            
        
        //게시글 정보 조회
        $boardModel = new Board();
        $resultBoard = $boardModel -> getBoardDetail($requestDate);
        
        //json 변환 처리
        $responseDate = json_encode($resultBoard);
        header('Content-type: application/json');
        echo $responseDate;
        exit;

        }

        //작성페이지로 이동
        public function create() {
            return 'insert.php';
        }

        //작성처리
        public function store() {
            $requestDate = [
            'b_title' => $_POST['b_title']
            ,'b_content'=> $_POST['b_content']
            ,'b_img' => '' 
            ];
            $requestDate['b_img'] = $this->saveImg($_FILES['file']);
        }


        private function saveImg ($file) {
            $type = explode('/', $file['type']); //이미지 확장자
            $fileName = uniqid().'.'.$type[1]; //파일 이름
            $filePath = _PATH_IMG.'/'.$fileName; //파일 경ㄹ
            move_uploaded_file($file['tmp_name'], _ROOT.$filePath); //파일 복사

            return $filePath;
        }
}   