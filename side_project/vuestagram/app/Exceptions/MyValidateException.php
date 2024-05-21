<?php

namespace App\Exceptions;

use Exception;

class MyValidateException extends Exception {
    /**
     * 에러 메세지 리스트
     * 
     * @return Array 에러 메세지 배열
     */
    public function context() {
        return [
            'E01' => ['status' => 400, 'msg' => '리퀘스트 데이터 이상'],
        ];
    }
}