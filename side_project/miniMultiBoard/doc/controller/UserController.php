<?php
namespace controller;

use model\UsersModel;
use lib\UserValidator;

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
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return "login.php";
        }

        // 유저 정보 획득
        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($requestData);

        // 유저 존재 유무 체크
        if(empty($resultUserInfo)) {
            // 에러메세지 
            $this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해주세요.";

            return "login.php";
        } 

        // 세션 u_id 저장
        $_SESSION["u_id"] = $resultUserInfo["u_id"]; // 슈퍼글로벌변수는 연관배열 
        // 로그인 성공시에만 셋팅되는 값

        // $_SESSION
        // 세션에 u_id 있다면 로그인 상태인 것

        // 로케이션 처리
        // TODO : 보드 리스트 게시판 타입 수정할 때 같이 수정
        return "Location: /board/list";
    }

        // 로그아웃 처리
        public function logoutGet() {
            // 세션 파기
            // session_unset("u_id"); // 세션의 해당 요소를 지운다
            session_destroy(); // 세션 전체를 모두 지운다

            return "Location: /user/login";
        }
    
}

