<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null;

try {

    if(strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
        $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
    
        if($id < 1) {
            throw new Exception("파라미터 뭔가 잘못적음 오류");
        }
    
        $conn = my_db_conn();

        $arr_prepare = [
            "id" => $id
        ];
        $result = discussion_select_id($conn, $arr_prepare);
    } else {
        //post처리
        $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;

        if($id <1) {
            throw new Exception("파라미터 오류");
        }

        $conn = my_db_conn();
        $conn->beginTransaction();

        $arr_prepare = [
            "id" => $id
        ];
        discussion_delete_id($conn, $arr_prepare);

        $conn->commit();
        header("Location: /discussion.php");
        exit;
    }

} catch (Throwable $th) {
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
    <link rel="stylesheet" href="./css/delete_dis.css">
    <link rel="stylesheet" href="./css/background.css">
    <title>발제문</title>
</head>
<body>
    <div class="board_title" style="background-image: url('../img/창_이모티콘.png');">
        <p>발제문</p>
    </div>
    <div class="container">
    <div class="delete_popup">
        <div class="delete" style="background-image: url('../img/창_이모티콘.png');"></div>
        <p>게시글을 정말로 삭제 하시겠습니까?</p>
        <div class="board_footer">
            <form action="/delete_dis.php" method="post">
            <input type="hidden" name="id" value="<?php echo $result["id"]?>">
            <a href="/detail_dis.php?id=<?php echo $result["id"]?> &page=<?php echo $page ?>"><button type="button" class="btn">취소</button></a>
            <button type="submit" class="btn">완료</button>
            </form>
        </div>
    </div>
    </div>
    <div class="menu_bar">
        <a href="/main.php">
            <img class="home_btn" src="../img/home_btn.png" alt="메인" width="146px" height="43px">
        </a>
    </div>
</body>
</html>