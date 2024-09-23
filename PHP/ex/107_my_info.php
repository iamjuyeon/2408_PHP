<?php
// 나의 사원 정보 입력(급여, 직급, 부서 정보 포함)
require_once("./my_db.php");
$conn = null;

try {
    $conn = my_db_conn();
    $conn->beginTransaction();

    // 사원 테이블 인서트
    $sql = 
            " INSERT INTO employees( "
            ." name "
            ." ,birth "
            ." ,gender "
            ." ,hire_at "
            ." ) "
            ." VALUES( "        
            ." :name "
            ." ,:birth "
            ." ,:gender "
            ." ,DATE(NOW()) "
            ." ) ";

    $arr_prepare = [
        "name" => "김김김"
        ,"birth" => "1993-05-07"
        ,"gender"  => "F"
    ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt = $stmt->rowCount();//영향받은 레코드 수 획득

    //쿼리 실행  예외 처리
    if(!$result_flg) {
        throw new Exception("INsert Query erroer : employees");
    }

    //영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("INsert COunt Erroer : employess");
    }

    $emp_id = $conn->lastInsertId();

    //-----------------------
    //급여 테이블 인서트
    $sql = 
            " INSERT INTO salaries( "
            ."        emp_id "
            ."       ,salary "
            ."       ,start_at "
            ." ) "
            ." VALUES( "
            ."        :emp_id "
            ."       ,:salary "
            ."       ,DATE(NOW()) "
            ." ) "
            ;

    $arr_prepare = [
        "emp_id" => $emp_id
        ,"salary" => 50000000
    ];
    
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt = $stmt->rowCount();//영향받은 레코드 수 획득

    //쿼리 실행  예외 처리
    if(!$result_flg) {
        throw new Exception("INsert Query erroer : Salaries");
    }

    //영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
        throw new Exception("INsert COunt Erroer : Salaries");
    }

    
    // ----------------
    // 직급 테이블 인서트
    
    $sql = 
        " INSERT INTO title_emps( "
        ."        emp_id "
        ."       ,title_code "
        ."       ,start_at "
        ." ) "
        ." VALUES( "
        ."        :emp_id "
        ."       ,:title_code "
        ."       ,DATE(NOW()) "
        ." ) "
        ;

    $arr_prepare = [
    "emp_id" => $emp_id
    ,"title_code" => "T001"
    ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt = $stmt->rowCount();//영향받은 레코드 수 획득

    //쿼리 실행  예외 처리
    if(!$result_flg) {
    throw new Exception("INsert Query erroer : tltle_emps");
    }

    //영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
    throw new Exception("Nsert COunt Erroer : title_emps");
    }


    //----------
    //부서 테이블 인서트
    $sql = 
            " INSERT INTO department_emps( "
            ."        emp_id "
            ."       ,dept_code "
            ."       ,start_at "
            ." ) "
            ." VALUES( "
            ."        :emp_id "
            ."       ,:dept_code "
            ."       ,DATE(NOW()) "
            ." ) "
            ;

    $arr_prepare = [
    "emp_id" => $emp_id
    ,"dept_code" => "D001"
    ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt = $stmt->rowCount();//영향받은 레코드 수 획득

    //쿼리 실행  예외 처리
    if(!$result_flg) {
    throw new Exception("INsert Query erroer : dept_emps");
    }

    //영향받은 레코드 수 예외 처리
    if($result_cnt !== 1) {
    throw new Exception("Nsert COunt Erroer : dept_emps");
    }


    //commit
    $conn->commit();
} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}