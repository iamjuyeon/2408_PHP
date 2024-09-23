<?php
// 3명의 신규 사원 정보를 employees에 추가
require_once("../ex/my_db.php");

$data = [
    ["name" => "둘리", "birth" => "1986-01-01", "gender" => "M"]
    ,["name" => "희동이", "birth" => "1990-01-01", "gender" => "M"]
    ,["name" => "고길동", "birth" => "1968-01-01", "gender" => "M"]
];

$conn = null;

try {
    $conn = my_db_conn();

    //트랜잭션
    $conn->beginTransaction(); //중간에 잘못되면 전부다 rollBack 할 수 있도록

    //복수의 데이터 루프
    foreach($data as $item) {
        $sql = 
            " INSERT INTO employees( "
            ."             name "
            ."             ,birth "
            ."             ,gender "
            ."             ,hire_at "
            ." ) "
            ." VALUES( "
            ."             :name "
            ."             ,:birth "
            ."             ,:gender "
            ."             ,DATE(NOW()) "
            ." ) "
        ;
        $arr_prepare = [
            "name" => $item["name"]
            ,"birth" => $item["birth"]
            ,"gender" => $item["gender"]
        ];
    }
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt = $stmt->rowCount();

    if(!$result_flg) {
        throw new Exception("Insert 쿼리 에러 발생");
    }
    if($result_cnt !== 1) {
        throw new Exception("수정 레코드 이상함");

    }

} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}