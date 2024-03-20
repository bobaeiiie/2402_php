<?php
require_once("./lib_db.php"); 

// $conn = db_conn(); 

// $sql =
//     " SELECT "
//     ."  * " 
//     ." FROM " 
//     ."  employees " 
//     ." LIMIT "
//     ."  5 " 
//     ;  
// $stmt =$conn->query($sql); 
// $result = $stmt->fetchAll(); 
// print_r($result);

// $conn = NULL; 

$limit = 3;
//try catch 안에 넣기
try {
    $conn = db_conn(); // PDO 객체 리턴 함수 호출

    // 쿼리 작성
    
    // placeholder(임시값) 셋팅이 없는 경우
    $sql = " SELECT * FROM employees LIMIT 5 "; 
    $stmt = $conn->query($sql); // 이 단계 분리한 경우가 플레이스홀더 셋팅?
    $result = $stmt->fetchAll(); 

    // placeholder(임시값) 셋팅이 필요한 경우
    $sql = " SELECT * FROM employees LIMIT :limit OFFSET :offset ";
    // :(주로 컬럼명) 나중에 값을 넘겨주겠다. 
    $arr_prepare = [
        "limit" => $limit
        ,"offset" => 0
    ];
    $stmt = $conn->prepare($sql); // 쿼리 준비
    $stmt->execute($arr_prepare); // 쿼리 실행
    $result = $stmt->fetchAll(); // 질의 결과 패치

    print_r($result);
} catch (Throwable $e) {
    echo "예외발생 : ".$e->getMessage()."\n";

} finally {
    $conn = null; // 같은 문법 안에 위치해야함 스코프(?)
}
echo "---------------------------------------\n\n"; 

// 사번 10001, 10002의 현재 연봉과 사번, 생일을 가져오는 쿼리를 작성해서 출력해주세요.
// prepared statement 이용해서 작성
$arr_emp_no = [10003, 10004];
try {
    $conn = db_conn();

    $sql2 =
    " SELECT sal.salary, emp.emp_no, emp.birth_date
    FROM salaries sal
        JOIN employees emp
            ON sal.emp_no = emp.emp_no
            AND sal.to_date >= DATE(NOW())
    WHERE emp.emp_no IN( :emp_no ) "; 

    $arr_prepare = [
        // "emp_no1" => $arr_emp_no[0]
        // ,"emp_no2" => $arr_emp_no[1]
        "emp_no" => implode(",",$arr_emp_no)
    ];

    $stmt = $conn->prepare($sql2);
    $stmt->execute($arr_prepare);
    $result = $stmt->fetchAll();

    print_r($result);
} catch (Throwable $e) {
    echo "예외 발생 : ".$e->getMessage()."\n";
} finally {
    $conn = null;
}

$arr = [10003,10004,10005];
var_dump(implode(",",$arr));

// -- (:emp_no1, :emp_no2) 