<?php
// 3명의 신규 사원 정보를 employees에 추가
// 성공한건 삽입, 실패는 롤백
require_once("../ex/my_db.php");

$data = [
    ["name" => "둘리", "birth" => "1986-01-01", "gender" => "M"]
    ,["name" => "희동이", "birth" => "ㅇㅇㅇㅇ", "gender" => "M"]
    ,["name" => "고길동", "birth" => "1968-01-01", "gender" => "M"]
];

$conn = null;

try {
    $conn = my_db_conn();

    foreach($data as $item) {
        try {
            //트랜잭션
            $conn->beginTransaction();

            //---------------------------
            $sql = 
            " INSERT INTO employees( "
            ."             name"
            ."             ,birth"
            ."             ,gender"
            ."             ,hire_at"
            ." ) "
            ." VALUES( "
            ."             :name"
            ."             ,:birth"
            ."             ,:gender"
            ."             ,DATE(NOW())"
            ." ) "
        ;
        $arr_prepare = [
            "name" => $item["name"]
            ,"birth" => $item["birth"]
            ,"gender" => $item["gender"]
        ];
    
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt = $stmt->rowCount();

    if(!$result_flg) {
        throw new Exception("Insert 쿼리 에러 발생");
    }
    if($result_cnt !== 1) {
        throw new Exception("수정 레코드 이상함");

    }
    
    $conn->commit();
        } catch(Throwable $th) {
            if(!is_null($conn)) {
                $conn->rollBack();

            }
            echo "안쪽 try문 : ".$th->getMessage();
        }
    }
} catch(Throwable $th) {
    echo "바깥쪽 try문 : ".$th->getMessage();
}




