<?php

// 세션 삭제

// 세션 쓰겠다고 선언
session_start();

// 특정 세션 요소만 삭제할 경우 unset 이용
// unset($_SESSION["my_session1"]);

// 세션 파기 (전체)
session_destroy();