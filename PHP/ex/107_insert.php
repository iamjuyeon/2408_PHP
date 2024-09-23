<?php
require_once("./my_db.php");
$conn = null; 
try {
   $conn = my_db_conn();

   //sql
   $sql = 
            " INSERT INTO employees( "
            ."      name "
            ."      ,birth "
            ."      ,gender "
            ."      ,hire_at "
            ."  ) "
            ." VALUES( "
            ."      :name "
            ."      ,:birth "
            ."      ,:gender "
            ."      ,DATE(NOW()) "
            ."  ) "
        ;

$arr_prepare = [
    "name" => "홍길동"
    ,"birth" => "2000-01-01"
    ,"gender" => "M"
];

//transaction 시작
$conn->beginTransaction(); //commit을 안하면 데이터가 저장 안됨

$stmt = $conn->prepare($sql); //쿼리준비
$exec_flg = $stmt->execute($arr_prepare); //쿼리실행
$result_cnt = $stmt->rowCount(); //영향 받은 레코드 수 반환

//쿼리 실행 예외 처리
if(!$exec_flg) {
    throw new Exception("excute 예외 발생", "1"); //강제로 예외 발생
}

//영향 받은 레코드 수 이상
if($result_cnt !==1) {
    throw new Exception("레코드 수 이상", "2"); //이상이 있을 경우 catch 로 넘어가서 출력
}
//commit 처리
$conn->commit();
} catch(Throwable $th) {
    //PDO 인스턴스화 됐는지 확인
    if(!is_null($conn)) {
        $conn->rollBack();
    }
    
    echo $th->getCode()." ".$th->getMessage();
}