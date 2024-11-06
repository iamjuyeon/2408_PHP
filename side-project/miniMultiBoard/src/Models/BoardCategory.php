<?php

namespace Models;

use Throwable;
use Models\Model;
class BoardCategory extends Model{
    public function getBoardName($paramArr) {
        try {
            $sql =
                ' SELECT '
                .' bc_name '
                .' FROM '
                .'      board_category '
                .' WHERE '
                .'      bc_type = :bc_type '
            ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            return $stmt->fetch();
        } catch (Throwable $th) {
            echo 'BoardCategory->getBoardName(), '.$th->getMessage();
            exit;
        }
    }

    
    public function getBoardsNameList() {
        try {
            $sql = 
                ' SELECT '
                .'  bc_name '
                .' ,bc_type '
                .' FROM '
                .'      board_category '
                .' ORDER BY '
                .'  bc_type ASC '
                ;
                $stmt = $this->conn->query($sql);
                return $stmt->fetchAll();
        } catch (Throwable $th) {
            echo 'BoardCategory->getBoardsNameList(), '.$th->getMessage();
    } 

    }
}