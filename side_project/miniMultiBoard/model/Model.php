<?php
namespace model; // 일반적으로 패스, 파일위치가 됨

use PDO;
// use Throwable; 인터페이스라서 안넣어도 됨

class Model {
    protected $conn; // PDO 객체 저장용

    // 생성자
    public function __construct() { // 객체를 인스턴스 할 때 자동으로 실행됨
        try{
            $opt = [
                PDO::ATTR_EMULATE_PREPARES      => false // DB의 Prepared Statement 기능을 사용하도록 설정
                ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION // PDO Exception 을 Throw 하도록 설정
                ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC // 연관배열로 Fetch 설정
            ];
            // PDO 인스턴스
            $this->conn = new PDO(_MARIA_DB_DNS, _MARIA_DB_USER, _MARIA_DB_PW, $opt); // $붙이지 않게 주의

        } catch(\Throwable $th) {
            echo "Model >> __construct, ".$th->getMessage();
            exit;
        }
    }

    // 트랜잭션 시작
    public function beginTransaction() {
        $this->conn->beginTransaction();
    }

    // 커밋
    public function commit() {
        $this->conn->commit();
    }

    // 롤백
    public function rollBack() {
        $this->conn->rollBack();
    }

    // DB 파기
    public function distroy() {
        $this->conn = null;
    }
    // 다른 방법) 파괴자 메소드 destructs. 생성자와 반대로 작동

}