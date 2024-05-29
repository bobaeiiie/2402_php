<?php

namespace App\Http\Controllers;

use App\Exceptions\MyAuthException;
use App\Exceptions\MyValidateException;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request) {
        // 유효성 검사
        $validator = Validator::make(
            $request->only('account', 'password')
            ,[
                'account' => ['required', 'min:4', 'max:20', 'regex:/^[a-zA-Z0-9]+$/']
                ,'password' => ['required', 'min:4', 'max:20', 'regex:/^[a-zA-Z0-9]+$/']
            ]
            );

        // 유효성 검사 실패시 처리
        if($validator->fails()) {
            Log::debug('유효성 검사 실패', $validator->errors()->toArray());
            throw new MyValidateException('E01');
        }

        // 유저 정보 획득
        $userInfo = User::select('users.*')
                            ->selectSub(function($query) {
                                $query->select(DB::raw('count(*)'))
                                        ->from('boards')
                                        ->whereColumn('users.id', 'boards.user_id');
                            }, 'boards_count')
                            ->where('account', $request->account)
                            ->first();

        // 유저 정보 없음
        if(!isset($userInfo)) {
            // 유저 없음
            throw new MyAuthException('E20');
        }
        else if(!(Hash::check($request->password, $userInfo->password))) {
            // 비밀번호 오류
            throw new MyAuthException('E21');
        }

        // 로그인 처리
        Auth::login($userInfo);
        
        // 레스폰스 데이터 생성
        $responseData = [
            'code' => '0'
            ,'msg' => '로그인 성공'
            ,'data' => $userInfo
        ];

        return response()->json($responseData, 200)->cookie('auth', '1', 120, null, null, false, false);
    }

    public function logout() {
        // 로그아웃
        Auth::logout(Auth::user());
        Session::invalidate(); // 기존 세션 파기하고 새로운 세션 생성
        Session::regenerateToken(); // csrf 토큰 재발급

        $responseData = [
            'code' => '0'
            ,'msg' => '로그아웃 완료'
        ];

        return response()
                ->json($responseData, 200)
                ->cookie('auth', '1', -1, null, null, false, false);
    }

    // 회원 가입
    public function registration(Request $request) {
        
        // 리퀘스트 데이터 획득
        $requestData = $request->all();

        // 유효성 검사
        $validator = Validator::make(
            $requestData
            ,[
                'account' => ['required', 'unique:users', 'min:4', 'max:20', 'regex:/^[a-zA-Z0-9]+$/']
                ,'password' => ['required', 'min:4', 'max:20', 'regex:/^[a-zA-Z0-9]+$/']
                ,'password_chk' => ['same:password']
                ,'name' => ['required', 'min:2', 'max:20', 'regex:/^[가-힣]+$/u']
                ,'gender' => ['required', 'regex:/^[0-1]{1}$/']
                ,'profile' => ['required', 'image']
            ]
        );

        // 유효성 검사 실패 처리
        if($validator->fails()) {
            Log::debug('유효성 검사 실패', $validator->errors()->toArray());
            throw new MyValidateException('E01');
        }

        // 작성 데이터 생성
        $insertData = $request->all();

        // 파일 저장
        $insertData['profile'] = $request->file('profile')->store('profile');

        // 비밀번호 설정
        $insertData['password'] = Hash::make($request->password);

        // 인서트 처리
        $userInfo = User::create($insertData);

        $responseData = [
            'code' => '0'
            ,'msg' => '로그아웃 완료'
            ,'data' => $userInfo
        ];

        return response()
                ->json($responseData, 200);
    }
}
