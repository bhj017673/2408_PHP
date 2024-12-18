<?php

namespace App\Exceptions;

use App\Http\Middleware\Authenticate;
use Illuminate\Auth\AuthenticationException;
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
     * 예외및 에러가 발생했을 떄 호출되며, 
     * 주로 로깅이나 외부서비스에 보고를 하기위한 작업을 수행한다
     */
    public function report(Throwable $th){
        Log::info('Report'.$th->getMessage());
    }

    /**
     * 에러핸들링 커스텀
     * 예외및 에러가 브라우저로 렌더링 되가전에 호출
     * 커스텀 HTTP응답을 전달
     */
    public function render($request, Throwable $th){
        // 예외코드 초기화
        $code = 'E99';
        Log::debug($th->getMessage());

        // 인스턴스 확인후 예외 정보 변경

        if($th instanceof AuthenticationException) {
            $code = 'E01';
        } else if ($th instanceof PDOException) {
            $code = 'E80';
        }

        $errInfo = $this->context()[$code];

        // Response Data 생성
        $responseData = [
            'success' => false
            ,'code' => $code
            ,'msg' => $errInfo['msg']
        ];

        return response()->json($responseData, $errInfo['status']);

    }

    /*
     * 에러메세지 리스트
     * 
     * @return Array 에러메세지 배열
     */
    public function context() {
        return [
            'E01' => ['status' => 401 ,'msg' => '인증실패'],
            'E80' => ['status' => 500 ,'msg' => 'DB 에러'],
            'E99' => ['status' => 500 ,'msg' => '시스템 에러'],
        
        ];
    }


}

