<?php
// DB 파일 자체가 각각페이지에서 불려짐.
// 사전에 설정 파일 부른 후 DB 불러오므로 여기서 설정파일 호출하지 않아도 됨

function my_db_conn() {
    //설정 정보
    $option = [
        PDO::ATTR_EMULATE_PREPARES      =>  FALSE
        ,PDO::ATTR_ERRMODE              =>  PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE   =>  PDO::FETCH_ASSOC
    ];
    // 리턴 PDO 객체 생성
    return new PDO(MARIADB_DSN, MARIADB_USER, MARIADB_PASSWORD, $option);
}

function db_select_boards_cnt(&$conn) {
    // sql 작성
    $sql = 
        "SELECT	
            COUNT(no) as cnt
        FROM	
            boards
        WHERE	
            deleted_at IS NULL "
    ;
    
    // Query 실행
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(); // result에 받는 이유. 예외 처리 과정 거친 후 리턴하기 위해

    // 리턴
    return (int)$result[0]["cnt"];
}

function db_select_boards_paging(&$conn, &$array_param) { 
    // &: 레퍼런스 파라미터. 변수의 주소값을 가져와서 해당 변수를 참조하는 것.
    // 단순 변수 사용: 함수에 변수 전달 시 변수 값이 복사되어 전달
    
    // sql 작성 
    $sql = 
        "SELECT	
            no
            ,title
            ,created_at
        FROM	
            boards
        WHERE	
            deleted_at IS NULL
        ORDER BY	
            no DESC
        LIMIT :list_cnt OFFSET :offset "
    ;

    // Query 실행
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);
    $result = $stmt->fetchAll(); // result에 받는 이유. 예외 처리 과정 거친 후 리턴하기 위해

    // 리턴
    return $result;
}

// ■ Insert row to boards 게시판 테이블 레코드 작성처리
function db_insert_boards(&$conn, &$array_param) {
    //SQL
    $sql =
        "INSERT INTO boards (
            title
            ,content
        )	
        VALUES (
            :tite
            ,:content
        ) "
    ;

    // Query 실행
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);

    // 리턴
    return $stmt->rowCount();
}

// pk로 게시글 정보 조회
function db_select_boards_no(&$conn, &$arr_param) {
    //SQL
    $sql =
        "SELECT	
            no
            ,title
            ,content
            ,created_at
        FROM	
            boards
        WHERE	
            no = :no "
    ;

    // Query 실행
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr_param);
    $result = $stmt->fetchAll(); 

    // 리턴
    return $result;

}


// pk로 특정 게시글 삭제 처리
function db_delete_boards_no(&$conn, &$array_param) {
    //SQL
    $sql =
        "UPDATE boards	
         SET	
            deleted_at = now()
         WHERE	
            no = :no " 
        ;

        // Query 실행
        $stmt = $conn->prepare($sql);
        $stmt->execute($array_param);
    
        // 리턴
        return $stmt->rowCount();
    }


// pk로 특정 레코드 수정
function db_update_boards_no(&$conn, $array_param) {
    //SQL
    $sql =
        "UPDATE boards	
         SET	
            title = :title 
            ,content = :content
            ,updated_at = NOW() 
         WHERE	
            no = :no " 
    ;

        // Query 실행
        $stmt = $conn->prepare($sql);
        $stmt->execute($array_param);
    
        // 리턴
        return $stmt->rowCount();
    }

