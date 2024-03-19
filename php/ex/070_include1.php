<?php

// include / 불러오는 파일의 소스코드를 그대로 가져오는 것과 같다
// include("./070_include2.php");
// echo "include 1";

include("./070_include2.php"); // 보통 최상단에 작성. 사전에 미리 불러옴
include_once("./070_include2.php"); // 여러번 적더라도 한번만 불러오게 함. 현업에서 사용
include_once("./070_include2.php"); // 실수 방지차 once 사용 권장
include_once("./070_include2.php");
// echo my_sum(1, 2);
// 1파일을 인클루드한 2파일을 3파일에 인클루드하면 1파일까지 가져온다
// 트라이앵글식으로 안만든다. 트리형식으로 상하관계가 있음
