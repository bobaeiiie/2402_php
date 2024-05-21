<?php

namespace App\Http\Controllers;

use App\Exceptions\MyAuthException;
use App\Exceptions\MyValidateException;
use App\Models\User;
use MyToken;
use MyUserValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            Log::debug('Login Validation Error', $resultValidate->errors()->all());
            throw new MyValidateException('E01');
        }

        // 유저 정보 조회
        $resultUserInfo = User::where('account', $request->account)
                                ->withCount('boards')                    
                                ->first();
        
        // 미등록 유저 체크
        if(!isset($resultUserInfo)) {
            throw new MyAuthException('E20');
        }

        // 패스워드 체크
        if(!(Hash::check($request->password, $resultUserInfo->password))) {
            throw new MyAuthException('E21');
        }

        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);

        // 리프레시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);
 

        // response Data
        $responseData = [
            'code' => '0'
            ,'msg' => '인증 완료'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
            ,'data' => $resultUserInfo
        ];
        
        return response()->json($responseData, 200);
    }
}
