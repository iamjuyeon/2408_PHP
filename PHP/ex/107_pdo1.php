<?php
//db 정보
$my_host = "127.0.0.1"; //host
$my_port = "3306"; //port
$my_user = "root";
$my_password = "php504";
$my_db_name = "dbsample";
$my_charset = "utf8mb4";

//DSN 
$my_dsn = "mysql:host=".$my_host.";port=".$my_port.";dbname=".$my_db_name.";charset=".$my_charset;

//pdo  옵션설정
$my_option = [
    //prepared statement의 애뮬레이션 설정
    PDO::ATTR_EMULATE_PREPARES      => false //db에서 emulation을 할거다
    // 예외발생시 예외처리방법 설정
    ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
    //fetch 할때 데이터 타입 설정 (객체지향은 = class)
    ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
];

//pdo class 인스턴스
// new : class를 인스턴스 할 때 사용
$conn = new PDO($my_dsn, $my_user, $my_password, $my_option);
//select
// $sql = " SELECT "
//         ."    * "
//         ." FROM "
//         ."      employees "
//         ." LIMIT 3 "
//         ;

// $stmt = $conn->query($sql);   //쿼리 실행 및 결과 반환
// $result = $stmt->fetchAll(); //쿼리 결과 fetch

// print_r($result);

//select 예제
$sql = " SELECT "
        ."  * "
        ." FROM "
        ."       employees "
        ." WHERE "
        ."      emp_id = :emp_id1 "
        ." OR emp_id = :emp_id2 "
    ;

$prepare = [
    "emp_id1" => 10001
    ,"emp_id2" => 10002
];

$stmt = $conn -> prepare($sql); //쿼리 준비
$stmt -> execute($prepare);  //쿼리 실행
$result = $stmt -> fetchAll(); //fetch 결과

print_r($result);