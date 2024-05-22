<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use PDOException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Exception 핸들링 커스텀
     */
    public function render($request, Throwable $exception) {
        // 데이터 초기화
        $errorCode = 'E99';
        $errorMsgList = $this->context();

        // Exception Instance 체크
        if($exception instanceof MyValidateException) {
            $errorCode = $exception->getMessage();
            $errorMsgList = $exception->context();
        }
        else if($exception instanceof MyAuthException) {
            $errorCode = $exception->getMessage();
            $errorMsgList = $exception->context();
        }
        else if($exception instanceof PDOException) {
            $errorCode = 'E80';
        }

        // Response Data 생성
        $responseData = [
            'code' => $errorCode
            ,'msg' => $errorMsgList[$errorCode]['msg']
        ];


        // 에러 로그
        Log::error('Error', $responseData);

        return response()->json($responseData, $errorMsgList[$errorCode]['status']);
    }

    /**
     * 에러 메세지 리스트
     * 
     * @return Array 에러 메세지 배열
     */
    public function context() {
        return [
            'E80' => ['status' => 500, 'msg' => 'DB에러가 발생했습니다.'],
            'E90' => ['status' => 500, 'msg' => '요청하신 서비스는 없는 서비스입니다.'],
            'E99' => ['status' => 500, 'msg' => '시스템 에러가 발생했습니다.'],
        ];
    }
}

