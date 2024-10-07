<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null;

try {
    if(strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {

        $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

        if($id <1 ) {
            throw new Exception("파라미터 오류");
        }

        //PDO 인스턴스
        $conn = my_db_conn();
        
        // 데이터 조회
        $arr_prepare = [
            "id" => $id
        ];
        $result = discussion_select_id($conn, $arr_prepare);

    } else {
        $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;

        $page = isset($_POST["page"]) ? (int)$_POST["page"] : 1;

        $title = isset($_POST["title"]) ? $_POST["title"] : "";

        // $created_at = isset($_POST["created_at"]) ? (int)$_POST["created_at"] : "";

        $content = isset($_POST["content"]) ? $_POST["content"] : "";

        //file 획득
        //$file = $_FILE[""file]; 이미지 파일 불러오기
    
        if($id <1 || $title === "") {
            throw new Exception("파라미터 오류");
        }


    
        //PDO 인스턴스
        $conn = my_db_conn();

        //트랜잭션
        $conn->beginTransaction();

        $arr_prepare = [
            "id" => $id
            ,"title" => $title
            // ,"created_at" => $created_at
            ,"content" => $content
        ];

        //file 저장 처리(파일명이 중복되지 않도록 unique id로 바꿈)
        // if($file["name"] !=="") {
        //  기존 파일 삭제 처리
            // $arr_prepare_select = [
            //     "id" => $id
            // ];
        // $result = discussion_select_id($conn $arr_prepare_select);
        // $if(!is_null($result["img"])) {
        // unlink(MY_PATH_ROOT.$result["img"]);    }
    
        //     $type = explode("/", $file["type"]); //[img,png] 이렇게 배열로 정렬
        //     $extension = $type[1]; //파일 확장자 가져오기
        //     $file_name = uniqid().".".$extension;
        //     $file_path = "/img/".$file_name;

        //     move_uploaded_file($file["tmp_name"], MY_PATH_ROOT.$file_path);//파일 저장
        //     $arr_prepare["img"] = $file_path;
        // }

        
        // my_boards_update($conn, $arr_prepare);
        


    discussion_update($conn, $arr_prepare);
    $conn->commit();
    header("Location: /discussion.php?id=".$id."&page=".$page);
    exit;
    }

    } catch(Throwable $th) {
    if(!is_null($conn) && $conn->inTransaction()) {
        $conn->rollBack();
    }

    require_once(MY_PATH_ERROR);
    exit;
}

?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/background.css">
    <link rel="stylesheet" href="./css/update_dis.css">
    <title>발제문 수정</title>

</head>
<body>
    <div class="board_title" style="background-image: url('../img/창_이모티콘.png');">
        <p>
        발제문
        <?php echo "/ ".$result["id"]." / ".$result["NAME"] ?>
        </p>
    </div>
    <div class="container">
        <form action="/update_dis.php" method="post">
        <input type="hidden" name="page" value="<?php echo $page?>">
        <input type="hidden" name="id" value="<?php echo $result["id"] ?>">
            <div class="post_box">
                <div class="box">
                    <div class="box_title">이름</div>
                    <div class="insert">
                        <input type="text" name="name" id="name" value="<?php echo $result["NAME"]?>">
                    </div>
                </div>
                <div class="box">
                    <div class="box_title">작성 일자</div>
                    <div class="insert"><?php echo $result["created_at"]?></div>
                </div>
                <div class="box">
                    <div class="box_title">제목</div>
                    <div class="insert">
                        <input type="text" name="title" id="title" maxlength="40" value="<?php echo $result["title"]?>">
                    </div>
                </div>
            </div>
            <div class="box_content">
                <textarea name="content" id="content" required><?php echo $result["content"]?></textarea>
            </div>
            <div class="board_footer">
                <button type="submit" class="btn">완료</button>
                <a href="/discussion.php"><button class="btn">목록</button></a>
                <a href="/detail_dis.php?id=<?php echo $result["id"]?>&page=<?php echo $page ?>"><button class="btn">취소</button></a>
            </div>
        </form>
    </div>
        
    <div class="menu_bar">
        <a href="/main.php">
            <img class="home_btn" src="../img/home_btn.png" alt="메인" width="146px" height="43px">
        </a>
    </div>
</body>
</html>