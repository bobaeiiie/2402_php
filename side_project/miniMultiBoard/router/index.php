<?php

// 설정파일 불러오는 처리
require_once("config.php");
require_once("router/Router.php");

// 오토로드 호출
require_once("autoload.php");

// 라우터 호출
new router\Router();
