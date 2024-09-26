<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null;

try {
    if(strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
        //GET처리

        //id획득
        $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
        
        //page 획득
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
        $result = my_board_select_id($conn, $arr_prepare);
        
       
    } else {
        //POST처리
    
        //--------------
        //파라미터 획득(메소드 설정)
        //--------------
        //id획득
        $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;
        
        //page 획득
        $page = isset($_POST["page"]) ? (int)$_POST["page"] : 1;

        //title 획득
        $title =isset($_POST["title"]) ? $_POST["title"] : "";

        //content 획득
        $content = isset($_POST["content"]) ? $_POST["content"] : "";

        //echo $content;
        //exit; 오류가 나면 이렇게 중간에 체크하는 법


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
            ,"content" => $content
        ];

        my_board_update($conn, $arr_prepare);

        //commit
        $conn->commit();

        //detail 페이지로 이동
        header("Location: /detail.php?id=".$id."&page=".$page);
        // html의 <head>에다가 ("Location: /")정보를 넣음(root 주소를 요청)
        exit; 
    }

} catch (Throwable $th) {
    if(!is_null($conn) && $conn->inTransaction()) {
        $conn->rollBack(); //트랙잭션이 시작했을때 rollBack를 하도록
    } //null 인지아닌지 먼저 체크하고 트랜잭션되도록

    require_once(MY_PATH_ERROR);
    exit;
}


?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/update.css">
    <title>수정 페이지</title>
</head>
<body>
    <?php
    require_once(MY_PATH_ROOT."header.php") 
    ?>
    <main>
        <form action="/update.php" method="post">
            <input type="hidden" name="page" value="<?php echo $result["id"]?>">
            <input type="hidden" name="id" value="<?php echo $result["id"] ?>"> 
        <!-- hidden 은 input를 숨겨준다 -->
        <div class="box title-box">
            <div class="box-title">글 번호</div>
            <div class="box-content"><?php echo $result["id"]?></div>
        </div>
        <div class="box title-box">
                <div class="box-title">제목</div>
                <div class="box-content">
                    <input type="text" name="title" id="title" value="<?php echo $result["title"]?>">
                </div>
        </div>
        <div class="box content-box">
            <div class="box-title">내용</div>
            <div class="box-content">
                <textarea name="content" id="content"><?php echo $result["content"]?></textarea>
            </div>
        </div>
        <div class="main-footer">
            <button type="submit" class="btn-small">완료</button>
            <a href="/detail.php?id=<?php echo $result["id"]?>&page=<?php echo $page ?>"><button type= "button" class="btn-small">취소</button></a>
        </div>
    </form>
    </main>
</body>
</html>