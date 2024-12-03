<?php

namespace App\Exceptions;

use Exception;

class MyAuthException extends Exception
{
    /**
     * 에러 메세지 리스트
     * 
     * @return Array 에러메세지 배열
     */
    public function context() {
        return [
            'E20' => ['status' => 401, 'msg' => '토큰X.']
            ,'E21' => ['status' => 401, 'msg' => '토큰만료.']
            ,'E22' => ['status' => 401, 'msg' => '위조토큰.']       //이해X
            ,'E23' => ['status' => 401, 'msg' => '양식이상.']
            ,'E24' => ['status' => 401, 'msg' => '토큰 정보이상.']
        ];
    }
}