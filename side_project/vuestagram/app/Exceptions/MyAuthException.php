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
            'E20' => ['status' => 401, 'msg' => '미등록 유저'],
            'E21' => ['status' => 401, 'msg' => '비밀번호 불일치'],
        ];
    }
}