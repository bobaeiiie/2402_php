<?php

require_once("./071_require3.php"); 

echo "require 1111"; // 불러오는 데 실패하면 즉시 프로그램 종료
// 인클루드와의 차이. 처리를 이어나가느냐 마느냐. 초보자일수록 리콰이어 권장 아예 멈추니까
// 섞어서 사용할 수 있지만 가능한 통일시킨다. 