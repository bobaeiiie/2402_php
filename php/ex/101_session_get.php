<?php

// 세션 저장됐는지 확인
session_start();

// 저장된 세선 데이터 획득
echo $_SESSION["my_session1"];
