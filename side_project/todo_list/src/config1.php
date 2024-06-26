<?php

// ■ MariaDB 관련	
define("MARIADB_HOST", "localhost");    // DB HOST
define("MARIADB_USER", "root");         // DB 유저
define("MARIADB_PASSWORD", "php505");   // DB 비밀번호
define("MARIADB_NAME", "todo_list");   // DB 명
define("MARIADB_CHARSET", "utf8mb4");   // DB 유니코드
define("MARIADB_DSN", "mysql:host=".MARIADB_HOST.";dbname=".MARIADB_NAME.";charset=".MARIADB_CHARSET);
	
	
// ■ PHP Path 관련	
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/");  // 웹서버 root 패스
define("FILE_LIB_DB", ROOT."bobae/lib/lib_db1.php");   // DB 파일 패스


// 유저 요청 정보
define("REQUEST_METHOD", strtoupper($_SERVER["REQUEST_METHOD"])); // 요청 메소드
// 버전업 등의 경우 혹시나 소문자로 표시되지 않게 대문자로 세팅 


// 프로젝트 시 그대로 사용 가능