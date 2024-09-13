<?php
require_once("./my_db.php");
try {


$conn = my_db_conn();

//prepared Statement : 누중에 쿼리문을 만들수 ㅣ
$id=1;
$sql = " SELECT "
        ."   * "
        ."FROM employees"
        ." WHERE "
        ." emp_id = :emp_id "
        ." AND name = :name "
    ;

$arr_prepare = [
    "emp_id" => $id
    ,"name" => "홍길동"
];

$stmt = $conn->prepare($sql); //db 질의 준비
$stmt->execute($arr_prepare); //질의 진행
$result = $stmt->fetchAll(); //질의 결과 패치

// print_r($result);
} catch(Throwable $th) {
    echo $th->getMessage(); //예외 메세지 출력
}