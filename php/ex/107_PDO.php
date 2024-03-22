<?php
/**
 * filename : PDO.php
 * info : skjghlzkjgkjsdfg
 * history
 *  V001 ckfjhldfk (사원번호) - (변경내용)
 *  V002 ckfjhldfk (사원번호) - (추가 변경내용)
 * 
 * 변경 이력 관리 현업 방식
 */


// MYSQL, PDO / PDO가 더 최신 모든 DB종류 상관 없이 연결 가능하게 함
// PDO Class

// DB 접속 정보
$dbHost     = "localhost"; // DB Host
$dbUser     = "root"; // DB 계정명
$dbPw       = "php505"; // DB 패스워드
$dbName     = "employees"; // DB명
$dbCharset  = "utf8mb4"; // DB charset
$dbDsn      = "mysql:host=".$dbHost.";dbname=".$dbName.";charset=".$dbCharset; // dns : 접속할 때 필요한 정보 
// myaql:host:localhost;dbname=employees;charset=utf8mb4;


// PDO 옵션
$opt = [
    // Prepared Statement로 쿼리를 준비할 때, PHP와 DB 어디에서 에뮬레이션 할 지 여부를 결정
    PDO::ATTR_EMULATE_PREPARES      => false // DB에서 에뮬레이션하게 설정
    // PDO에서 예외를 처리하는 방식을 지정
    ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
    // DB의 결과를 저장하는 방식을 결정
    ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC // 연상배열로 패치
];
// " SELECT * FROM a WHERE emp_no = :emp_no" 프리페어드 스테이트먼트.
// 미완성된 쿼리 만들기

$conn = new PDO($dbDsn, $dbUser, $dbPw, $opt); // conn : 커넥션 약자

// 쿼리 작성
// $sql = " SELECT * FROM employees LIMIT 10 "; // 습관적으로 앞 뒤 공백, PHP에서는 세미콜론 X
// 현업 방식. 수정에 용이하게 하기 위해
$sql = " SELECT " 
    ."  * " 
    ." FROM " 
    ."  employees " // 속해있다는 뜻으로 앞에 인덴트 넣기.
    ." LIMIT "
    //  ." 10 " // del 240320 (변경한 사람 등의 정보가 담긴 코드 V001~가 적힘)
    ."  5 " // add 240320
     ;  

$stmt =$conn->query($sql); // 쿼리 준비 + 실행 // stmt : statement 약자
$result = $stmt->fetchAll(); // 질의 결과 패치
print_r($result);


$conn = NULL; // PDO 파기

