<?php
namespace model;

class BoardsNameModel extends Model {
    public function getBoardsNameList() {
        try {
            $sql = 
                " SELECT "
                ."  b_type "
                ."  ,bn_name "
                ." FROM "
                ."  boardsname "
                ." ORDER BY "
                ." b_type ASC "
                ;

                $stmt = $this->conn->query($sql);
                $result = $stmt->fetchAll();

                return $result;

        } catch (\Throwable $th) {
            echo "BoardsNameModel >> getBoardsNameList, ".$th->getMessage();
            exit;
        }
    }
};