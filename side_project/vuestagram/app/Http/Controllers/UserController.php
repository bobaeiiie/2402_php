<?php

namespace App\Http\Controllers;

use App\Exceptions\MyAuthException;
use App\Exceptions\MyValidateException;
use App\Models\User;
use MyToken;
use MyUserValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    /**
     * 로그아웃
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return response()
     */
    public function logout(Request $request) {
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');

        $userInfo = User::find($id);

        MyToken::removeRefreshToken($userInfo);

        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $userInfo
        ];

        return response()->json($responseData, 200);
    }

    /**
     * 토큰 재발급
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return response() json
     */
    public function reissue(Request $request) {
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        // 유저 PK 획득
        Log::debug('************************ 토큰 재발급 시작');
        Log::debug('베어러 토큰 : '.$request->bearerToken());
        Log::debug('유저 PK : '.$id);

        // 유저 정보 획득
        // DB::select('select * from users where id = ?', $id);
        $resultUserInfo = User::find($id);
        Log::debug('유저 정보 : ', $resultUserInfo->toArray());

        // 유효한 유저 확인
        if(!isset($resultUserInfo)) {
            throw new MyAuthException('E20'); 
        }
        Log::debug('유효한 유저 확인 완료');

        // 리프레시 토큰 체크
        if($request->bearerToken() !== $resultUserInfo->refresh_token) {
            throw new MyAuthException('E23'); 
        }
        Log::debug('리프레시 토큰 체크 완료');
        
        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);
        Log::debug('리프레시 토큰 발행 완료');

        // 리프레시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);
        Log::debug('리프레시 토큰 저장 완료');
 

        // response Data
        $responseData = [
            'code' => '0'
            ,'msg' => '인증 완료'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
            ,'data' => $resultUserInfo
        ];
        
        Log::debug('************************ 토큰 재발급 완료');

        return response()->json($responseData, 200);

    }

    /**
     * 회원가입
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return response()
     */
    public function signup(Request $request) {
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        
        // 유저 PK 획득
        // Log::debug('************************ 토큰 재발급 시작');
        // Log::debug('베어러 토큰 : '.$request->bearerToken());
        // Log::debug('유저 PK : '.$id);

        // // 유저 정보 획득
        // // DB::select('select * from users where id = ?', $id);
        // $resultUserInfo = User::find($id);
        // Log::debug('유저 정보 : ', $resultUserInfo->toArray());

        // // 유효한 유저 확인
        // if(!isset($resultUserInfo)) {
        //     throw new MyAuthException('E20'); 
        // }
        // Log::debug('유효한 유저 확인 완료');

        $requestData = [
            'account' => $request->account
            ,'password' => $request->password
            ,'passwordChk' => $request->password_chk
            ,'name' => $request->name
            ,'gender' => $request->gender
            ,'profile' => $request->profile
        ];

        // 유효성 검사
        $resultValidate = MyUserValidate::myValidate($requestData);

        //유효성 검사 실패 처리
        if($resultValidate->fails()) {
            Log::debug('Login Validation Error', $resultValidate->errors()->all());
            throw new MyValidateException('E01');
        }

        // 유저 정보 조회
        // $resultUserInfo = User::where('account', $request->account)
        //                         ->withCount('boards')                    
        //                         ->first();
        
        // 등록된 유저 체크
        if(isset($resultUserInfo)) {
            throw new MyValidateException('E02');
        }

        // 패스워드 체크
        if(!(Hash::check($request->password, $resultUserInfo->password))) {
            throw new MyAuthException('E21');
        }

        // 회원 정보 인서트
        User::create($insertData);

        
        return response()->json($responseData, 200);
    }
}
