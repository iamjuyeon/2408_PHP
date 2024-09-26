<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null;

try {
    //url로 이동하면 get으로 받음
    if(strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
    
    //GET 처리
    //id 획득
    $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
    
    //page 획득
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

    if($id < 1) {
        throw new Exception("파라미터 뭔가 잘못적음 오류");
    }
    
    
    //먼저 select문으로 id조회*******
    //PDO 인스턴스
    $conn = my_db_conn();

    // 데이터 조회
    $arr_prepare = [
        "id" => $id
    ];
    $result = my_board_select_id($conn, $arr_prepare); //여기서 delect문으로 연결함

}   else {
    //post 처리
    //id 획득(id만 지우면 되니깐 id만 처리하기)
    $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;
    
    // //page 획득
    // $page = isset($_POST["page"]) ? (int)$_POST["page"] : 1;

    // //title 획득
    // $title =isset($_POST["title"]) ? $_POST["title"] : "";

    // //content획득
    // $content_at = isset($_POST["content"]) ? (int)$_POST["content"] : "";
    
    // //created_at 획득
    // $created_at = isset($_POST["created_at"]) ? (int)$_POST["created_at"] : "";
    
    if($id <1) {
        throw new Exception("파라미터 오류");
    }

    //PDO 인스턴스
    $conn = my_db_conn();

    //트랜잭션
    $conn->beginTransaction();

    //이게 delete문 불러오는거
    $arr_prepare = [
        "id" => $id
    ];

    my_board_delete_id($conn, $arr_prepare);

//     $result = my_board_delete_id($conn, $arr_prepare); 

// }
    
    //commit
    $conn->commit();
    //삭제 하면 리스트 페이지로 이동
    header("Location: /");
    exit; 
}

}   catch (Throwable $th) {
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
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/delete.css">
    <title>삭제 페이지</title>
</head>
<body>
    <?php
    require_once(MY_PATH_ROOT."header.php") 
    ?>
    <main>
        <div class="main-header">
            <p>삭제하면 영구적으로 복구할 수 없습니다.</p>
            <p>정말로 삭제 하시겠습니까??????</p>
        </div>
        <div class="main-content">
            <div class="box title-box">
                <div class="box-title">게시글 번호</div>
                <div class="box-content"><?php echo $result["id"]?></div>
            </div>
            <div class="box title-box">
                <div class="box-title">작성일</div>
                <div class="box-content"><?php echo $result["created_at"]?></div>
            </div>
            <div class="box title-box">
                <div class="box-title">제목</div>
                <div class="box-content"><?php echo $result["title"]?></div>
            </div>
            <div class="box title-box">
                <div class="box-title">내용</div>
                <div class="box-content"><?php echo $result["content"]?></div>
            </div>
        </div>
        <div class="main-footer">
            <!-- 삭제 버튼은 a태그로 하면 안됨 -->
             <!-- method post를 쓰려면 form 태그에 method 입력해줌 -->
            <form action="/delete.php" method="post"> 
                <input type="hidden" name="id" value="<?php echo $result["id"]?>">   
                <button type="submit" class="btn-small">동의</button>
                <a href="/detail.php?id=<?php echo $result["id"]?> &page=<?php echo $page ?>"><button type="button" class="btn-small">취소</button></a>
            </form>
        </div>
    
    </main>
</body>
</html>