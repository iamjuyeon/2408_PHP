<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null;
$max_board_cnt = 0;
$max_page = 0;

//페이지에 게시글이 6개 오도록
try {
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
    $offset = ($page -1)* MY_LIST_COUNT;

    //PDO 인스턴스
    $conn = my_db_conn();

    // 최대 페이지 획득 처리
    $max_board_cnt = discussion_total_count($conn);//게시글 총수
    $max_page = (int)ceil($max_board_cnt / MY_LIST_COUNT);//올림
    $start_page_button_number = (int)(floor(($page-1) / MY_PAGE_BUTTON_COUNT) * MY_PAGE_BUTTON_COUNT) + 1 ; //화면 표시 페이지 버튼 시작 값
    $end_page_button_number = $start_page_button_number + (MY_PAGE_BUTTON_COUNT - 1);  //페이지 버튼 마지막 값
    $end_page_button_number = $end_page_button_number > $max_page ? $max_page : $end_page_button_number;
    $prev_page_button_number = $page - 1 < 1 ? 1 : $page -1; //이전버튼 작동
    $next_page_button_number = $page + 1 > $max_page ? $max_page : $page + 1; //다음 버튼

    //prepared statment
    $arr_prepare = [
        "list_cnt" => MY_LIST_COUNT
        ,"offset"  => $offset
    ];

    //pagination select
    $result = discussion_select_pagination($conn, $arr_prepare);


} catch(Throwable $th) {
    // echo $th->getMessage();
    require_once(MY_PATH_ROOT."error.php"); //에러 페이지
    exit; // 이 이후의 처리를 안함

}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/discussion.css">
    <link rel="stylesheet" href="./css/background.css">
    <title>발제문</title>
</head>
<body>
    <div class="board_title" style="background-image: url('../img/창_이모티콘.png');">
        <p>발제문</p>
    </div>
    <div class="container">
        <div class="btn_spot">
            <a href="/post_discussion.php"><button class="btn">글 작성</button></a>
        </div>
        <div class="board">
            <div class="item_bar">
                <div>번호</div>
                <div>제목</div>
                <div>이름</div>
                <div>작성 날짜</div>
            </div>
            
            <?php foreach($result as $item) { ?>
            
            <div class="item">
                <div><?php echo $item["id"] ?></div>
                <a href="/detail.dis.php?id=<?php echo $item["id"]?>&page=<?php echo $page ?>"><div><?php echo $item["title"]?></div></a>
                <div><?php echo $item["NAME"]?></div>
                <div><?php echo $item["created_at"]?></div>
            </div>
                <?php } ?> 
            </div>


        <div class="pagination">
            <?php if($page !== 1) { ?>
                <a href="/discussion.php?<?php echo $prev_page_button_number ?>"><button>이전</button></a>
            <?php } ?>
            <div class="page_num">
            <?php for($p = $start_page_button_number; $p <= $end_page_button_number; $p++) { ?>
            <a href="/discussion.php?page=<?php echo $p ?>"><?php echo $p ?></a>
            <?php } ?>
            </div>
            
            <?php if($page !== $max_page) { ?>
                <a href="/discussion.php?php=<?php echo $next_page_button_number?>"><button>다음</button></a>
            <?php } ?>
        </div>
    </div>
    <div class="menu_bar">
        <a href="/main.php">
            <img class="home_btn" src="../img/home_btn.png" alt="메인" width="146px" height="43px">
        </a>
    </div>
</body>
</html>