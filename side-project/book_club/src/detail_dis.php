<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null;

try {
    //id 획득
    $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;


    //page 획득
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

    if($id < 1) {
        throw new Exception("파라미터 오류");
    }

    //DB연결
    $conn = my_db_conn();

    $arr_prepare = [
        "id" => $id
    ];
    $result = discussion_select_id($conn, $arr_prepare);


} catch(Throwable $th) {
    require_once(MY_PATH_ERROR); //에러 페이지
    exit;
}


?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/detail_dis.css">
    <link rel="stylesheet" href="./css/background.css">
    <title>발제문</title>
</head>
<body>
    <div class="board_title" style="background-image: url('../img/창_이모티콘.png');">
        <p>
        발제문
        <?php echo "/ ".$result["id"]." / ".$result["NAME"] ?>
        </p>
    </div>
    <div class="container">
        <div class="post_box">
            <div class="box">
                <div class="box_title">이름</div>
                <div class="box_content"><?php echo $result["NAME"] ?></div>
            </div>
            <div class="box">
                <div class="box_title">작성 일자</div>
                <div class="box_content"><?php echo $result["created_at"] ?></div>
            </div>
            <div class="box">
                <div class="box_title">제목</div>
                <div class="box_content"><?php echo $result["title"]?></div>
            </div>
        </div>
        <div class="content"><?php echo $result["content"] ?></div>
        <div class="board_footer">
            <a href="/update_dis.php?id=<?php echo $result["id"]?>&page=<?php echo $page ?>"><button class="btn" type="button">수정</button></a>
            <a href="/discussion.php?page=<?php echo $page ?>"><button class="btn" type="button">목록</button></a>
            <a href="/delete_dis.php?id=<?php echo $result["id"]?>&page=<?php echo $page ?>"><button class="btn" type="button">삭제</button></a>
        </div>
    </div>
        
    <div class="menu_bar">
        <a href="/main.php">
            <img class="home_btn" src="../img/home_btn.png" alt="메인" width="146px" height="43px">
        </a>
    </div>
</body>
</html>