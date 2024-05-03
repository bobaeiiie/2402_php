<?php 

namespace lib;

class UserValidator {
        // static : php 요청오면 이 객체들은 메모리에 미리 올라가서 인스턴스하지 않아도 사용 가능
        // 여러군데에서 자주 쓰일 시 static은 사용상 편의성이 좋다는 장점이 있음
        // 타입힌트: 개발자의 실수를 막는 방법
    public static function chkValidator(array $param_arr){ 
        // 에러 메세지 보관용 
        $arrErrorMsg = [];

        // 패턴 생성
        $patternEmail = "/^[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}@[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}\.[a-zA-Z]{2,3}$/";
        $patternPassword = "/^[a-zA-Z0-9!@]{8,20}$/";
        $patternName = "/^[^ㄱ-ㅎ][가-힣]{1,50}$/";

        // 이메일 체크
        if(array_key_exists("u_email", $param_arr)) {
            if(preg_match($patternEmail, $param_arr["u_email"], $matches) === 0) {
                $arrErrorMsg[] = "이메일 형식이 맞지 않습니다.";
            }
        }

        // 비밀번호 체크
        if(array_key_exists("u_pw", $param_arr)) {
            if(preg_match($patternPassword, $param_arr["u_pw"], $matches) === 0) {
                $arrErrorMsg[] = "비밀번호는 영어 대소문자 및 숫자, 특수문자(!,@) 8~20로 작성해주세요.";
            }
        }

        // 이름 체크
        if(array_key_exists("u_name", $param_arr)) {
            if(preg_match($patternName, $param_arr["u_name"], $matches) === 0) {
                $arrErrorMsg[] = "이름은 한글만 입력해주세요.";
            }
        }
        
        return $arrErrorMsg;
        
    }
}