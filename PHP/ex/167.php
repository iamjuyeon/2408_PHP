<?php
    //http method  get 요청 데이터 받는 방법
    echo $_GET["id"];
    
    echo isset($_GET["id"])? $GET["id"] : 1; 
    var_dump($_GET); 
?>
 <!-- http : 스키마 -->
<!-- www.naver.com :도메인 -->
 <!-- user/login 리소스 -->

 <!-- ?id=1234 :파라미터 -->
 <!-- user/login 리소스 path -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="id" id="id">
        <br>
        <button type="submit">버튼</button>
    </form>
</body>
</html>