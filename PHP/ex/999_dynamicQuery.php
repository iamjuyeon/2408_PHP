<?php
//동적 쿼리 : 상황에 따라 sql를 적용
$data = [
    "name" => "둘리"
    // ,"gender" => "M"
    // ,"birth" => "1990-01-01"
];

$sql =
    " SELECT * "
    ." FROM employees "
    ;

$where = ""; 
$arr_prepare = [];

foreach($data as $key => $val) {
    if(empty($where)) {
      $where .= " WHERE ";
    } else {
        $where .= "   AND ";
    }
    $where.="  ".$key." = :".$key;

    //prepared statment 작성
    $arr_prepare[$key] = $val;


}
$sql .= $where;
// echo $sql."\n";

// print_r($arr_prepare);

require_once("./my_db.php");
$conn = my_db_conn();

$stmt = $conn->prepare($sql);
$stmt->execute($arr_prepare);
print_r($stmt->fetchAll());