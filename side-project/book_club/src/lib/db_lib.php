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

function discussion_select_pagination(PDO $conn, array $arr_param) {

// select sql
$sql = 
" SELECT "
."      * "
." FROM "
."      discussion_board "
." WHERE "
."      deleted_at IS NUll "
." ORDER BY "
."      created_at DESC " // 게시글 번호 내림차순 정렬
."      ,id DESC "
." LIMIT :list_cnt OFFSET :offset " //한페이지에 게시글 6개까지 보이게
;

$stmt = $conn->prepare($sql);
$result_flg = $stmt->execute($arr_param);

if(!$result_flg) {
    throw new Exception("데이터 불러오기 쿼리 실행 오류");
}

return $stmt->fetchAll(); //정보 다 가져오기
}

function discussion_total_count(PDO $conn) {
    $sql =
        " SELECT "
        ."      COUNT(*) cnt "
        ." FROM "
        ."      discussion_board "
        ." WHERE "
        ."      deleted_at IS NULL "
        ;

    $stmt = $conn->query($sql); //query -> prepare과 execute를 동시 처리
    $result = $stmt->fetch(); //fetch 검색한 결과에서 젤 윗줄 부터 하나씩 가져옴(1차원 배열)
    return $result["cnt"];


}


//id로 발제문 게시글 조회
function discussion_select_id(PDO $conn, array $arr_param) {
    $sql = 
        " SELECT "
        ."      * "
        ." FROM "
        ."     discussion_board "
        ." WHERE "
        ."      id = :id "
        ;
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("id로 조회하는 쿼리문 이상");
    }
    return $stmt->fetch();
}

// id로 인상깊은 문장 게시글 조회
function sentense_select_id(PDO $conn, array $arr_param) {
    $sql = 
        " SELECT "
        ."      * "
        ." FROM "
        ."     sentense_board "
        ." WHERE "
        ."      id = :id "
        ;
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("id로 조회하는 쿼리문 이상");
    }
    return $stmt->fetch();
}


// insert 게시글 작성하기
function discussion_insert(PDO $conn, array $arr_param) {
    $sql = 
        " INSERT INTO discussion_board ( "
        ."              title "
        ."              ,NAME "
        ."              ,content "
        ." ) "
        ." VALUES ( "
        ."      :title "
        ."      ,:NAME "
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

//update 수정

function discussion_update(PDO $conn, array $arr_param) {
    $sql = 
        " UPDATE discussion_board "
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


// delete 게시글 삭제
function discussion_delete_id(PDO $conn, $arr_param) {
    $sql = 
    " UPDATE discussion_board "
    ." SET "
    ."     updated_at = NOW() "
    ."     ,deleted_at = NOW() "
    ." WHERE "
    ."      id = :id "
    ;

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