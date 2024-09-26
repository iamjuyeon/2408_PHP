<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null;

// $_SERVER["REQUEST_METHOD"] 유저가 보낸 데이터가 'GET'인지 'POST'인지 확인하여 처리
if(strtoupper($_SERVER["REQUEST_METHOD"] === "POST")) {
    try {
        //pdo 인스턴스
        $conn = my_db_conn();

        //insert 처리
        $arr_prepare = [
            "title" => $_POST["title"]
            ,"content" => $_POST["content"]
        ];

        // beginTransaction
        $conn->beginTransaction();
        my_board_insert($conn, $arr_prepare);

        $conn->commit();
        header("Location: /"); //html의 <head>에다가 ("Location: /")정보를 넣음(root 주소를 요청)
        exit; 

    } catch(Throwable $th) {
        if(!is_null($conn)) {
            $conn->rollBack();
        }
        require_once(MY_PATH_ERROR);
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/insert.css">
    <title>작성 페이지</title>
</head>
<body>
    <?php
    require_once(MY_PATH_ROOT."/header.php") 
    ?>
    <main>
        <form action="/insert.php" method="post">
        <div class="box title-box">
            <div class="box-title">제목</div>
            <div class="box-content">
                <input type="text" name="title" id="title">
            </div>
        </div>
        <div class="box content-box">
            <div class="box-title">내용</div>
            <div class="box-content">
                <textarea name="content" id="content"></textarea>
            </div>
        </div>
        <div class="main-footer">
            <button type="submit" class="btn-small">작성</button>
            <a href="/"><button type="button" class="btn-small">취소</button></a>
        </div>
    </form>
    </main>
</body>
</html>