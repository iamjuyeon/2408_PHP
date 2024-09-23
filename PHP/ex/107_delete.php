<?php
require_once("./my_db.php");
$conn = null;
try {
    $conn = my_db_conn();
    $conn->beginTransaction();//트랙잭션 시작
    $sql = 
            " DELETE FROM employees "
            ." WHERE "
            ."      emp_id = :emp_id "
            ;
    
    $arr_prepare  = [
        "emp_id" => 100001
    
    ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt = $stmt->rowCount(); //영향받은 레코드의 수 획득

    if(!$result_flg) {
        throw new Exception("쿼리 실행 예외 발생");
    }
    $conn->commit();
} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }

    if($result_cnt> 1 ) {
        throw new Exception("삭제 레코드 수 이상");//2개 이상이 삭제되면 이상
    }
    echo $th->getMessage();
}


