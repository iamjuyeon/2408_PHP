<?php

namespace App\Exceptions;

use Exception;

class MyAuthException extends Exception
{
    public function context() {
        return [
            'E20' => ['status' => 401, 'msg' => '토큰이 없습니다'],
            'E21' => ['status' => 401, 'msg' => '만료된 토큰입니다'],
            'E22' => ['status' => 401, 'msg' => '위조된 토큰입니다.']
        ];
}
}