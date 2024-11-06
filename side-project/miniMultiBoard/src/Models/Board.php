<?php
namespace Models;

use Models\Model;
use Throwable;

class Board extends Model {
    public function getBoardList(array $paramArr) {
        try {
            $sql =
                ' SELECT * '
                .' FROM boards '
                .' WHERE '
                .'  bc_type = :bc_type '
                .' AND u_deleted_at IS NULL '
                .' ORDER BY '
                .'      u_created_at DESC, b_id DESC '
            ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            return $stmt->fetchAll();
        } catch (Throwable $th) {
            echo 'Board->getBoardList(), '.$th->getMessage();
            exit;
        }
    }

    // public function getBoardDetail(array $paramArr) {
    //     try {
    //         $sql =
    //             ' SELECT * '
    //             .' FROM boards '
    //             .' WHERE '
    //             .'       b_id = :b_id '
    //             .'       AND u_deleted_at IS NULL '

    //         ;
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute($paramArr);
    //         return $stmt->fetch();
    //     } catch (Throwable $th) {
    //         echo 'Board->getBoardDetail(), '.$th->getMessage();
    //         exit;
    //     }
    // }

    //게시글 정보 가져오기(이름, 제목, 내용, 이미지)
    public function getBoardDetail(array $paramArr) {
        try {
            $sql =
                ' SELECT '
                .' users.u_id '
                .' ,users.u_name '
                .' ,boards.b_id '
                .' ,boards.b_title '
                .' ,boards.b_content '
                .' ,boards.b_img '
                .' ,boards.u_deleted_at '
                .' FROM boards '
                .'      JOIN users '
                .'      ON users.u_id = boards.u_id '
                .' WHERE '
                .'       boards.b_id = :b_id '
                .'       AND boards.u_deleted_at IS NULL '

            ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            return $stmt->fetch();
        } catch (Throwable $th) {
            echo 'Board->getBoardDetail(), '.$th->getMessage();
            exit;
        }
    }
}