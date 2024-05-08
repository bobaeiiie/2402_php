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

    // 회원 정보 인서트
    public function addUserInfo($paramArr) {
        try {
            $sql = 
                " INSERT INTO users ("
                ."  u_email "
                ."  ,u_pw "
                ."  ,u_name "
                ."  ) "
                ." VALUES ("
                ."  :u_email "
                ."  ,:u_pw "
                ."  ,:u_name "
                ."  ) "
            ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);

            return $stmt->rowCount();

        } catch (\Throwable $th) {
            echo "UsersModel >> addUserInfo(), ".$th->getMessage();
            exit;
        }
    }

    // 회원 정보 조회
    public function getUserName() {
        try {
            $sql = 
                " SELECT "
                ."  u_name "
                ." FROM "
                ."  users "
                ." WHERE "
                ."  u_id = :u_id "
            ;
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
    
            return $result;
    
        } catch (\Throwable $th) {
            echo "UsersModel >> getUserName(), ".$th->getMessage();
            exit;
        }

    }

    public function updatePost($paramArr) {
        try {
            $sql = 
                " UPDATE users "
                ." SET "
                ." u_name = :u_name "
                ." ,u_pw = :u_pw "
                ." WHERE "
                ."  u_id = :u_id "
            ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);

            return $stmt->rowCount();

        }
        catch(\Throwable $th) {
            echo "UserModel >> userEditPost(), ".$th->getMessage();
        }
    }

    // // 회원 정보 표시
    // public function userEditData($paramArr) {

    // }

    // public function getUserData() {

    // }

}

// $obj = new UsersModel();
// $obj->getUserInfo([]);


