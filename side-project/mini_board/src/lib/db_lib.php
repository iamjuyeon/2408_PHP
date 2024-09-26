<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
function my_db_conn() {
    $option = [
        PDO::ATTR_EMULATE_PREPARES  => false
        ,PDO::ATTR_ERRMODE         => PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
    ];
    
    return new PDO(MY_MARIADB_DSN, My_MARIADB_USER, My_MARIADB_PASSWORD, $option);
}

function my_board_select_pagination(PDO $conn, array $arr_param) {



//sql
$sql =
" SELECT "
."      * "
." FROM "
."     board "
." WHERE "
."      deleted_at IS NULL "
." ORDER BY "
."      created_at DESC "
."      ,id DESC "
." LIMIT :list_cnt OFFSET :offset "
;


$stmt = $conn->prepare($sql);
$result_flg = $stmt->execute($arr_param);

if(!$result_flg) {
    throw new Exception("쿼리 실행 실패");
}

return $stmt->fetchAll(); //정보를 다 가져옴(다차원 배열)

}

// board 테이블 유효 게시글 총 수 획득
function my_board_total_count(PDO $conn) {
    $sql =
        " SELECT "
        ."      COUNT(*) cnt "
        ." FROM "
        ."    board "
        ."  WHERE "
        ."      deleted_at IS NULL "
        ;

    $stmt = $conn->query($sql); //query -> prepare과 execute를 동시 처리
    $result = $stmt->fetch(); //fetch 검색한 결과에서 젤 윗줄 부터 하나씩 가져옴(1차원 배열)
    return $result["cnt"];

}

// board 테이블 insert처리
function my_board_insert(PDO $conn, array $arr_param) {
    $sql =
        " INSERT INTO board ( "
        ."          title "
        ."          ,content "
        ." ) "
        ." VALUES ( "
        ."      :title "
        ."      ,:content "
        ." ) "
        ;


$stmt = $conn->prepare($sql);
$result_flg = $stmt->execute($arr_param);

if(!$result_flg) {
    throw new Exception("쿼리 실행 실패");
}

$result_cnt = $stmt->rowCount();

if($result_cnt !== 1) {
    throw new Exception("Insert Count 이상");
}

return true;

}

//id로 게시글 조회
function my_board_select_id(PDO $conn, array $arr_param) {
    $sql =
        " SELECT "
        ."      * "
        ." FROM "
        ."     board "
        ." WHERE "
        ."      id = :id "
        ;
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }
    return $stmt->fetch();
}

//delet로 board 게시글 삭제
function my_board_delete_id(PDO $conn, array $arr_param) {
    
    //삭제해도 데이터베이스에 정보는 남아 있어야 하니까
    $sql =
        " UPDATE board "
        ." SET "
        ."      updated_at = NOW() "
        ."      ,deleted_at = NOW() "
        ." WHERE "
        ."      id = :id"
    ;
    //이렇게 하면 다 데이터베이스도 다 삭제
    // $sql =  
    //     " SELECT "
    //     ."      * "
    //     ." FROM "
    //     ."      board "
    //     ." WHERE "
    //     ."      id = :id "
    //     ;
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }
    if($stmt->rowCount() !== 1) {
        throw new Exception("Delete count 이상");
    }
    return true;
}

//update
function my_board_update(PDO $conn, array $arr_param) {
    $sql = 
        " UPDATE board "
        ." SET "
        ."      title = :title "
        ."      ,content = :content "
        ."      ,updated_at = NOW() "
        ." WHERE "
        ."      id = :id "
        ;
    
        $stmt = $conn->prepare($sql);
        $result_flg = $stmt->execute($arr_param);

        if(!$result_flg) {
            throw new Exception("업데이트 쿼리 실행 실패");

        }

        if($stmt->rowCount() !== 1 ) {
            throw new Exception("update count 이상");
        }

        return true;
}