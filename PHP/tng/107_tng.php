<?php

//나의 급여를 2500만원으로 변경해주세요
require_once("../ex/my_db.php");

$conn = null;
try {
    $conn = my_db_conn();
    
    //트랜잭션 시작
    $conn->beginTransaction();
    
    // ---------------------------------
    $sql = 
        " UPDATE salaries "
        ." SET "
        ."      end_at = DATE(NOW()) "
        ."      ,updated_at = NOW() "
        ." WHERE "
        ."      emp_id = :emp_id "
        ." AND end_at IS NULL"
        ;
    
    $arr_prepare = [
        "emp_id" => 100011
    ];
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt = $stmt->rowCount(); //보통은 변수에 안담음
    
    if(!$result_flg) {
        throw new Exception("쿼리 에러 발생");
    }
    if($result_cnt !== 1) {
        throw new Exception("수정 레코드 이상함(1)");

    }

    // ---------------------------------------
    $sql = 
        " INSERT INTO salaries( "
        ."      emp_id "
        ."     ,salary  "
        ."     ,start_at "
        ."     ,end_at  "
        ."     ,created_at "
        ."     ,updated_at "
        ."     ,deleted_at "
        ."   ) "
        ." VALUES( "
        ."     :emp_id "
        ."     ,:salary "
        ."     ,DATE(NOW()) "
        ."     ,null "
        ."     ,NOW() "
        ."     ,NOW() "
        ."     ,null "
        ." ) "
        ;

    $arr_prepare = [
        "emp_id" => 100011
        ,"salary" => 25000000
    ];
    
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt = $stmt->rowCount();

    if(!$result_flg) {
        throw new Exception("Insert 쿼리 에러 발생");
    }
    if($result_cnt !== 1) {
        throw new Exception("수정 레코드 이상함(2)");

    }

    // --------------------------------------------
    //commit
    $conn->commit();

} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}