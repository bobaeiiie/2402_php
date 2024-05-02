<?php
namespace model;

class UsersModel extends Model {
    // 특정 유저 정보를 조회하는 메소드
    public function getUserInfo($paramArr) {
        // 동적쿼리를 만들어서 어떤 조건에도 찾을 수 있게 함
        // $paramArr = [
        //     "u_id" => 1
        //     ,"u_email" => "srhsh@dths.com"
        //     ,"u_pw" => "dzjtzdfjdfz"
        // ];

        try {
            $sql = " SELECT * "
            ." FROM users "
            ." WHERE ";
            
            // WHERE절 동적생성
            $arrWhere = [];
            foreach($paramArr as $key => $val) {
                $arrWhere[] = $key." = :".$key;
            }
            
            // WHERE절 추가
            $sql .= implode(" and ", $arrWhere);
            
            // DB에서 쿼리 돌리고 데이터 가져오는 처리
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            $result = $stmt->fetchAll();
            return count($result) > 0 ? $result[0] : $result;
            
        } catch(\Throwable $th) {
            echo "UsersModel >> getUserInfo(), ".$th->getMessage();
        }
    }

}

// $obj = new UsersModel();
// $obj->getUserInfo([]);