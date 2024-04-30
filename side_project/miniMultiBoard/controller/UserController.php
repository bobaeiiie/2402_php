<?php
namespace controller;

class UserController extends Controller {
    
    // 로그인 페이지로 이동
    protected function loginGet() {
        return "login.php";
    }

    // 로그인 처라
    protected function loginPost() {
        // 유저 입력 정보 획득
        $requestData = [
            "u_email" => $_POST["u_email"]
            ,"u_pw" => $_POST["u_pw"]
        ];

        // 유효성 체크
        // TODO : 나중에 구현

        // 유저 존재 유무 체크

        // 세션 u_id 저장

        // $_SESSION
        // 세션에 u_id 있다면 로그인 상태인 것

        // 로케이션 처리
    }
}

