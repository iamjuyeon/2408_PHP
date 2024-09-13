<?php

// PDO class : DB 엑세스 방법 중 하나

//DB 접속 정보
$my_host = "localhost"; //DB HOST  (ip주소)
$my_user = "root"; //DB 계정명
$my_password = "php504"; //DB 계정 비밀번호
$my_db_name = "dbsample"; //접속할 DB 명
$my_charset = "utf8mb4"; //DB charset
//DSN: db에 접속하기 위한 문자열
$my_dsn = "mysql:host=".$my_host.";dbname=".$my_db_name.";charset=".$my_charset; 

// PDO 옵션 설정
$my_otp = [
    //prepared Statement(보안으로 필수)로 쿼리를 준비할때, PHP와 DB어디에서 에뮬레이션 할지 여부 결정
    PDO::ATTR_EMULATE_PREPARES => false //DB에서 에뮬레이션 하도록 설정
    // PDO에서 예외를 처리하는 방식을 지정
    ,PDO::ATTR_ERRMODE         => PDO::ERRMODE_EXCEPTION
    //DB의 결과를 fetch하는 방식을 지정
    ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //연관배열로 fetch

];

//DB접속
$conn = new PDO($my_dsn, $my_user, $my_password, $my_otp); 

//select
//사원
$sql = "SELECT *
        FROM employees
        order BY emp_id ASC
        LIMIT 5";

$stmt = $conn->query($sql);//PDO::query(): 쿼리 준비 + 실행
$result = $stmt->fetchAll(); //질의 결과를 패치
print_r($result);

//사번과 이름만 출력
foreach($result as $item) {
    echo $item["emp_id"]." ".$item["name"]."\n";
}

