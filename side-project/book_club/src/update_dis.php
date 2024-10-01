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

        $name = isset($_POST["name"]) ? $_POST["name"] : "";

        $title = isset($_POST["title"]) ? $_POST["title"] : "";

        $content = isset($_POST["content"]) ? $_POST["content"] : "";
    
        if($id <1 || $title === "") {
            throw new Exception("파라미터 오류");
        }
    
        //PDO 인스턴스
        $conn = my_db_conn();

        //트랜잭션
        $conn->beginTransaction();

        $arr_prepare = [
            "id" => $id
            ,"name" => $name
            ,"title" => $title
            ,"content" => $content
        ];
    
    discussion_update($conn, $arr_param);

    $conn->commit();
    header("Location: /detail.dis.php?id=".$id."&page=".$page);
    exit;
    }

    } catch(Throwable $th) {
    if(!is_null($conn) && $conn->inTransaction()) {
        $conn->rollBack();
    }
}
require_once(MY_PATH_ERROR);
exit;


?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/background.css">
    <link rel="stylesheet" href="./css/update.dis.css">
    <title>발제문 수정</title>

</head>
<body>
        <div class="board_title" style="background-image: url('../img/창_이모티콘.png');">
        <p>발제문</p>
    </div>
    <div class="container">
        <form action="/detail_dis.php" method="post">
        <input type="hidden" name="page" value="<?php echo $result["id"]?>">
            <div class="post_box">
                <div class="box">
                    <div class="box_title">이름</div>
                    <div>
                        <input type="text" id="name" class="insert" value="필릭스" >
                        <input type="hidden" name="">
                    </div>
                </div>
                <div class="box">
                    <div class="box_title">작성 일자</div>
                    <div class="box_content">2024-09-26</div>
                </div>
                <div class="box">
                    <div class="box_title">제목</div>
                    <div>
                        <input type="text" name="title" id="title" class="insert" maxlength="20" value="<?php echo $result["title"]?>">
                    </div>
                </div>
            </div>
            <div class="box_content">
                <textarea name="content" id="content" required><?php echo $result["content"]?></textarea>
            </div>
            <div class="board_footer">
                <button type="submit" class="btn">완료</button>
                <a href="./discussion.php"><button class="btn">목록</button></a>
                <a href="./discussion.php?id=<?php echo $result["id"]?>&page=<?php echo $page ?>"><button class="btn">취소</button></a>
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