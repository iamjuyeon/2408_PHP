<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/error.css">
    <link rel="stylesheet" href="./css/background.css">
    <title>error</title>
</head>
<body>
<div class="board_title" style="background-image: url('../img/창_이모티콘.png');">
        <p>error</p>
    </div>
    <div class="container">
        <div class="delete_popup">
            <div class="delete" style="background-image: url('../img/창_이모티콘.png');">
                <p>error</p>
            </div>
            <p>서버 점검 중입니다...
            <a href="/main.php"><button class="btn">메인으로</button></a>
            </p>
            
        </div>
    </div>
    <div class="menu_bar">
        <a href="/main.php">
            <img class="home_btn" src="../img/home_btn.png" alt="메인" width="146px" height="43px">
        </a>
    </div>
</body>
</html>