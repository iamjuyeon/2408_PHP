<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null;

if(strtoupper($_SERVER["REQUEST_METHOD"] === "POST")) {
    try {
        $conn = my_db_conn();

        $arr_prepare = [
            "title" => $_POST["title"]
            ,"NAME" => $_POST["name"]
            ,"content" => $_POST["content"]
        ];

    $conn->beginTransaction();
    discussion_insert($conn, $arr_prepare);
    
    $conn->commit();
    header("Location: /discussion.php");
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
    <link rel="stylesheet" href="./css/post_dis.css">
    <link rel="stylesheet" href="./css/background.css">
    <title>발제문</title>
 </head>
 <body>
    <div class="board_title" style="background-image: url('../img/창_이모티콘.png');">
        <p>발제문 글 작성</p>
    </div>
    <div class="container">
        <form action="/post_discussion.php" method="post">
            <div class="box">
                <div class="box_title">이름</div>
                <div class="insert">
                    <input type="text" id="name" name="name" autofocus required >
                </div>
                <div class="box_title">제목</div>
                <div class="insert">
                    <input type="text" id="title" name="title" required maxlength="20">
                </div>
            </div>
                <div>
                <div class="box_content_title">내용</div>
                <div class="box_content">
                    <textarea name="content" id="content" required></textarea>
                </div>
                </div>
            <div class="board_footer">
                <a href="/discussion.php"><button class="btn" type="button">취소</button></a>
                <button class="btn" type="submit">완료</button>
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