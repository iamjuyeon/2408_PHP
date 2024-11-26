<?php

namespace App\Exceptions;


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

    //라라벨이 작동하면서 발생하는 모든 예외 처리
    //예외 및 에러가 발생했을때 호출되며 주로 로깅이나 외부 서비스에 보고를 하기 위한 작업 수행
    public function report(Throwable $th) { //Throwable: 모든 예외의 최상위 객체
        Log::info('Report : '. $th->getMessage());
        
        //예외 정보 초기화
            // $code = 'E99';

        
        //인스턴스 확인 후 예외 정보 변경
        // if($th instanceof AuthenticationException) {
        //     $code = $th->getMessage();
        // }
        // $errInfo = $this->context()[$code];
        // Log::info($code.':'.$errInfo['msg']);
    }

    //에러 핸들링 커스텀
    //예외 및 에러가 브라우저로 렌더링 되기 전에 호출
    //커스텀 http응답을 전달
    public function render($request, Throwable $th) { //response 직적에 호출
        //예외 정보 초기화
        $code = 'E99';

        //인스턴스 확인 후 예외 정보 변경
        if($th instanceof AuthenticationException) {
            $code = 'E01';
        } else if($th instanceof PDOException) {
            $code = 'E80';
        }

        // if(
        //     $th instanceof AuthenticationException
        //     || $th instanceof PDOException  
        // ){    
        //     $code = $th->getMessage();
        // }
        $errInfo = $this->context()[$code];
        

        //커스텀 Exception 인스턴스 확인
        if($th instanceof MyAuthException) {
            $code = $th->getMessage();
            $errInfo = $th->context()[$code]; //에러메세지 배열
        }


        //response Data 생성
        $responseData = [
            'successe' => false
            ,'code' => $code
            ,'msg' => $errInfo['msg']
        ];
        return response()->json($responseData, $errInfo['status']);

    }

    //에러 메세지 리스트
    //@return Array 에러메세지 배열
    public function context() {
        return [
            'E01' => ['status' => 401, 'msg' => '인증 실패'],
            'E80' => ['status' => 500, 'msg' => 'DB에러가 발생했습니다.'],
            'E99' => ['status' => 500, 'msg' => '시스템 에러가 발생했습니다.'],
        ];
    }
}
