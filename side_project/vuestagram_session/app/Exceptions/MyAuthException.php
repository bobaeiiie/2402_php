<?php

namespace App\Exceptions;

use Exception;

class MyAuthException extends Exception {
    /**
     * 에러 메세지 리스트
     * 
     * @return Array 에러 메세지 배열
     */
    public function context() {
        return [
            'E20' => ['status' => 401, 'msg' => '해당 회원 정보가 없습니다.'],
            'E21' => ['status' => 401, 'msg' => '비밀번호를 다시 확인해 주세요.'],
            'E22' => ['status' => 401, 'msg' => '미인증 유저입니다.'],
            'E23' => ['status' => 401, 'msg' => '사용 불가능한 토큰입니다.'],
            'E24' => ['status' => 401, 'msg' => '토큰의 정보에 오류가 있습니다.'],
            'E25' => ['status' => 401, 'msg' => '유효한 토큰이 아닙니다.'],
            'E26' => ['status' => 401, 'msg' => '만료된 토큰입니다.'],
        ];
    }
}