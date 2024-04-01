<?php

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




// -----------------------------------------------------------------------------------------------------


function db_select_boards_cnt(&$conn) {
    // sql 작성
    $sql = 
        "SELECT	
            COUNT(content_no) as cnt_no
        FROM	
            contents
        WHERE	
            deleted_at IS NULL "
    ;
    
    // Query 실행
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(); // result에 받는 이유. 예외 처리 과정 거친 후 리턴하기 위해

    // 리턴
    return (int)$result[0]["cnt_no"];
}

function db_select_boards_paging(&$conn, &$array_param) { 
    // &: 레퍼런스 파라미터. 변수의 주소값을 가져와서 해당 변수를 참조하는 것.
    // 단순 변수 사용: 함수에 변수 전달 시 변수 값이 복사되어 전달
    
    // sql 작성 
    $sql = 
        "SELECT	
            user_name
            ,content
            ,content_no
            ,created_at
            ,checked_at
        FROM	
            contents
        WHERE	
            deleted_at IS NULL
        ORDER BY	
            content_no DESC
        LIMIT :list_cnt OFFSET :offset "
    ;

    // Query 실행
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);
    $result = $stmt->fetchAll(); // result에 받는 이유. 예외 처리 과정 거친 후 리턴하기 위해

    // 리턴
    return $result;
}


function checked(&$conn, &$arr_param) {
    $sql=
        " SELECT  
            checked_at
        FROM 
            contents
        WHERE 
            deleted_at IS NULL 
        ORDER BY  checked_at DESC 
        LIMIT :list_cnt OFFSET :OFFSET "
    ;
}

function db_update_contents_checked_at(&$conn, &$array_param) {
    $sql = 
        " UPDATE contents
        SET checked_at = CASE WHEN checked_at IS NULL THEN NOW() ELSE NULL END
        WHERE content_no = :content_no "
    ;

    // Query 실행
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_param);

    // 리턴
    return $stmt->rowCount();
}

function db_select_boards_no(&$conn, &$arr_param){
    //SQL
    $sql = 
        "SELECT
            content
            ,content_no
            ,created_at
        FROM	
            contents
        WHERE	
            content_no = :content_no "
    ;

    // Query 실행
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr_param);
    $result = $stmt->fetchAll(); 

    // 리턴
    return $result;

    }

function db_update_boards_no(&$conn, &$array_param) {
    //SQL
    $sql =
        "UPDATE contents
         SET
            content = :content
            ,updated_at = NOW() 
         WHERE	
            content_no = :content_no " 
    ;

        // Query 실행
        $stmt = $conn->prepare($sql);
        $stmt->execute($array_param);
    
        // 리턴
        return $stmt->rowCount();
    }


function db_delete_boards_no(&$conn, &$array_param) {
    //SQL
    $sql =
        "UPDATE contents	
            SET	
            deleted_at = now()
            WHERE	
            content_no = :content_no " 
        ;

        // Query 실행
        $stmt = $conn->prepare($sql);
        $stmt->execute($array_param);
    
        // 리턴
        return $stmt->rowCount();
    }