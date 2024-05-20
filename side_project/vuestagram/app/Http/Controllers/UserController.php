<?php

namespace App\Http\Controllers;

use MyUserValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function login(Request $request) {
        // debug(출력 문자열, 배열), LOG_LEVEL=debug일 때만 찍힘 
        Log::debug('Start Login', $request->all());

        $requestData = [
            'account' => $request->account
            ,'password' => $request->password
        ];
        // 유효성 검사
        $resultValidate = MyUserValidate::myValidate($requestData);

        //유효성 검사 실패 처리
        if($resultValidate->fails()) {

        }

        // response Data
        $responseData = [
            'code' => '0'
            ,'msg' => '인증 완료'
            ,'accessToken' => 'accessToken'
            ,'refreshToken' => 'refreshToken'
        ];
        return response()->json($responseData, 200);
    }
}
