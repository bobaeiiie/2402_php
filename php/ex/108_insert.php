<?php
require_once("./lib_db.php");
try {
    $conn = db_conn(); // PDO 인스턴스 생성

    $sql =
    "INSERT INTO employees (
        emp_no
        ,birth_date
        ,first_name
        ,last_name
        ,gender
        ,hire_date
    ) 
    VALUES (
        :emp_no
        ,:birth_date
        ,:first_name
        ,:last_name
        ,:gender
        ,DATE(NOW())
    ) ";
    $arr_prepare = [
        "emp_no" => 700000
        ,"birth_date" => 20000124
        ,"first_name" => "hong"
        ,"last_name" => "hong"
        ,"gender" => "M"
    ]; 

    // transaction 시작
    $conn->beginTransaction();
    $stmt = $conn->prepare($sql); // db 질의 준비
    $result = $stmt->execute($arr_prepare); // db 질의 실행
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드 수 획득

    // 예외 처리
    if($result_cnt !== 1) { // 영향받은 레코드가 1개가 아니면~
        // 개발자의 필요에 따라 강제로 예외 발생 시키는 방법
        throw new Exception("영향받은 레코드 수 이상"); // 겟메세지에 들어갈 문구
    }

    // 정상 완료
    $conn->commit();
    echo $result_cnt." 커밋 완료\n";
} catch (\Throwable $e){
    // conn이 NULL이 아니면 rollback
    if(!empty($conn)) {
        $conn->rollBack();
    }
    echo "예외 발생 : ".$e->getMessage();
} finally {
    $conn = null;
}  