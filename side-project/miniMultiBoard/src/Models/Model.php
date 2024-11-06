<?php
namespace Models;

use Throwable;
use PDO;

class Model {
    protected $conn; // PDO 객체 저장용

    //생성자
    public function __construct() {
        try {
            $opt = [
                PDO::ATTR_EMULATE_PREPARES   => false //DB의 prepared statement 기능을 사용하도록 설정
                ,PDO::ATTR_ERRMODE         => PDO::ERRMODE_EXCEPTION //PDO exception 을 throws하도록
                ,PDO::ATTR_DEFAULT_FETCH_MODE  =>PDO::FETCH_ASSOC //연관 배열로 fetch설정
            ];
            $this->conn = new PDO(_MARIA_DB_DNS, _MARIA_DB_USER, _MARIA_DB_PASSWORD, $opt);

        } catch(Throwable $th) {
            echo 'Model->__contruct(),'.$th->getMessage();
            exit;
        }
    }


    //트랜잭션
    public function beginTrasaction() {
        $this -> conn->beginTransaction();
    }

    //커밋
    public function commit() {
        $this->conn->commit();
    }

    //롤백
    public function rollback() {
        $this->conn->rollback();
    }
}