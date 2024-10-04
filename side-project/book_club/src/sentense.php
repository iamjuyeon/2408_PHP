<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null;
$max_board_cnt = 0;
$max_page = 0;

try {
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
    $offset = ($page -1)* SENTENSE_LIST_COUNT;


    $conn = my_db_conn();

    $max_board_cnt = sentense_total_count($conn);// 게시글 총수 획득
    $max_page = (int)ceil($max_board_cnt / SENTENSE_LIST_COUNT); //무조건 '올림'
    $start_page_btn_num = (int)(floor(($page - 1) / SENTENSE_BUTTON_COUNT) * SENTENSE_BUTTON_COUNT) + 1;// 화면 표시 페이지 버튼 시작 값 
    $end_page_btn_num = $start_page_btn_num + (SENTENSE_BUTTON_COUNT - 1); // 화면 표시 페이지 버튼 마지막 값
    $end_page_btn_num = $end_page_btn_num > $max_page ? $max_page : $end_page_btn_num;
    $prev_page_btn_num = $page - 1 < 1 ? 1 : $page - 1; //이전버튼
    $next_page_btn_num = $page + 1 > $max_page ? $max_page : $page + 1; //다음 버튼



    $arr_prepare = [ 
        "list_cnt" => SENTENSE_LIST_COUNT
        ,"offset" => $offset
    ];

    $result = sentense_select_pagination($conn, $arr_prepare);

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
    <link rel="stylesheet" href="./css/background.css">
    <link rel="stylesheet" href="./css/sentense.css">
    <title>인상깊은 문장</title>
</head>
<body>
    <div class="board_title" style="background-image: url('../img/창_이모티콘.png');">
        <p>인상깊은 문장</p>
    </div>
    <div class="container">
        <div class="btn">
            <a href="/insert_sen.php"><button>글 작성</button></a>
        </div>
        <div class="table">
            <div class="box-list">목록</div>
            <div class="box-content">내용</div>
            <div class="list" style="height: 410px; overflow-y: auto">
                
            <?php foreach($result as $item) { ?>
                <div>
                    <img src="../img/free-icon-font-menu-burger-3917215.png" alt="">
                    <a href="/sentense.php"><span><?php echo $item["id"]?></span></a>
                </div>
                <ul>
                    <li><?php echo $item["title"]?></li>
                    <li><?php echo $item["NAME"]?></li>
                    <li><?php echo $item["created_at"]?></li>
                </ul>
                <?php } ?>
                <div>
                    <img src="../img/free-icon-font-menu-burger-3917215.png" alt="">
                    <a href="./sentense.php"><span>게시글 번호 6</span></a>
                </div>
                <ul >
                    <li>달과 6펜스</li>
                    <li>필릭스</li>
                    <li>2024-09-28</li>
                </ul>

                <div class="page_btn">
                    <?php if($page !==1) { ?>
                        <a href="/sentense.php?<?php echo $prev_page_btn_num?>">
                            <img src="../img/black-left-arrow-short.png" width="15px" height="15px">
                        </a>
                    <?php } ?>

                    
                    <?php for($p = $start_page_btn_num; $p <= $end_page_btn_num; $p++) {?>
                        <a href="/sentense.php?page=<?php echo $p ?>"><span><?php echo $p ?></span></a>
                    <?php } ?>
                    

                    <?php if($page !== $max_page) { ?>
                    <a href="/sentense.php?php=<?php echo $next_page_btn_num?>">
                    <img src="../img/black-right-arrow-short.png" width="15px" height="15px">
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="content" style="height: 410px; overflow-y: auto">
                <div class="info">
                    <div>작성일자 : </div>
                    <div>2024-09-23</div>
                </div>
                <div class="info">
                    <div>이름 : </div>
                    <div>필릭스</div>
                </div>
                <div class="info">
                    <div>책 제목 : </div>
                    <div>달과 6펜스</div>
                </div>
                <div>이게 예술이라면 예술은 필요없다</div>
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