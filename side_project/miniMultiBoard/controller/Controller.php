<?php
namespace controller;

class Controller {
    // 생성자
    public function __construct($action) {

        // 세션 시작
        if(!isset($_SESSION)) {
            session_start();
        }

        // 유저 로그인 및 권한 체크
        // TODO : 나중에 추가

        // 해당 action 호출
        // view 이름이 string으로 담김
        $resultAction = $this->$action();

        // view 호출
        // TODO : 나중에 로케이션 처리 되도록 수정
        require_once("view/".$resultAction);

        exit; // php 처리 종료
    }
}

