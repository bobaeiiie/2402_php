<?php

// 세션명을 지정하는 방법
session_name("login");
// PHPSESSID -> php로 만든것을 숨기기 위해

// 세션 시작 (무조건)
// 세션 시작 전에 출력 처리 있으면 안됨(echo, var_dump 등), 최상단에 있어야 함
session_start();

// 세션에 데이터 작성
$_SESSION["my_session1"] = "세션1";

// 브라우저 껐다가 켜면 세션 정보 사라짐