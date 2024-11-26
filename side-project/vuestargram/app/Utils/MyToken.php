<?php
namespace App\Utils;

use App\Exceptions\MyAuthException;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use MyEncrypt;
use PDOException;

class MyToken {
    // *******엑세스 토큰과 리프레쉬 토큰 생성 ***********
    //@param App\Models\User
    //@return Array [$accessToken, $refreshToken]
    public function createTokens(User $user) {
        $accessToken = $this->createToken($user, env('TOKEN_EXP_ACCESS'));
        $refreshToken = $this->createToken($user, env('TOKEN_EXP_REFRESH'), false);

        return [$accessToken, $refreshToken];
    }
    // *************************************************
    // **************refresh 토큰 업데이트***************
    // *************************************************
    //@param App\Model\User $userInfo
    //@param string $refreshToken

    //@param bool true
    public function updateRefreshToken(User $userInfo, string|null $refreshToken) {
        //유저 모델에 리프레트 토큰 변경
        $userInfo->refresh_token = $refreshToken;

        // DB::beginTransaction();

        if(!($userInfo->save())) {
            DB::rollBack();

            throw new PDOException('Error updateRefreshToken()');
        }

        // DB::commit();
        return true;

    }

    // **************토큰 유효성 체크****************
    //@param string $token (bearer token)
    //@return bool true
    public function chkToken(string|null $token) {
        Log::debug("********************** chkToken start ******************" );

        //토큰 존재 유무 체크
        if(empty($token)) {
            throw new MyAuthException('E20');
        }

        //토큰 위조 검사
        list($header, $payload, $signature) = $this->explodeToken($token);
        if(MyEncrypt::subSalt($this->createSignature($header, $payload), env('TOKEN_SALT_LENGTH')) 
            !== MyEncrypt::subSalt($signature, env('TOKEN_SALT_LENGTH'))) {
            throw new MyAuthException('E22');
        }


        //유효 시간 체크
        //현재 시간보다 작으면 과거 -> 유효시간 만료
        if($this->getValueInPayload($token, 'exp') < time()) {
            throw new MyAuthException('E21');
        }
        Log::debug("********************** chkToken end *******************");

        return true;
    }

    
    //*********페이로드에서 해당하는 키의 값을 반환 *********/
    //@param string $token
    //@param string $key
    //@return 페이로드에서 추출한 값
    public function getValueInpayload(string $token, string $key) {
        //토큰 분리
        list($header, $payload, $signature) = $this->explodeToken($token);
        $decodedPayload = json_decode(MyEncrypt::base64UrlDecode($payload));

        //페이로드에 해당키의 데이터가 있는지 체크
        // null인지 확인
        if(empty($decodedPayload) || !isset($decodedPayload->$key)) {
            throw new MyAuthException('E24');
        }
        return $decodedPayload->$key;
    }


    // **********JWT 생성****************
    //@param  App\Models\User $user
    //@param int $ttl time to limit 제한시간까지 담는 변수
    //@param bool $accessFlg = true (: accessToken, false : refreshToken)
    //@return string JWT -> 단순한 문자열이라서 string으로 반환

    private function createToken(User $user, int $ttl, bool $accessFlg = true) {
        $header = $this->createHeader();
        $payload = $this->createPayload($user, $ttl, $accessFlg);
        $signature = $this->createSignature($header, $payload);
        return $header.'.'.$payload.'.'.$signature;
    }

    // ************JWT Header 생성************
    //@return string base64UrlEncode
    private function createHeader() {
        $header = [
            //토큰에서 사용할 때 세글자로 -> 이유 없음
            'alg' => env('TOKEN_ALG')
            ,'typ' => env('TOKEN_TYPE')
        ];

        return MyEncrypt::base64UrlEncode(json_encode($header));
    }

    // **********JWT payload 작성**************
    //@param  App\Models\User $user
    //@param int $ttl time to limit 제한시간까지 담는 변수
    //@param bool $accessFlg = true (: accessToken, false : refreshToken)\

    //@return string base64Payload

    private function createPayload(User $user, int $ttl, bool $accessFlg = true) {
        $now = time(); //현재시간

        //payload 기본 데이터 생성
        $payload = [
            'idt' => $user->user_id
            ,'iat' => $now //발급 시간
            ,'exp' => $now + $ttl
            ,'ttl' => $ttl
        ];

        //엑세스 토큰일 경우 아래 데이터 추가x
        if($accessFlg) {
            $payload['acc'] = $user->account;
        }
        return MyEncrypt::base64UrlEncode(json_encode($payload));
    }
        // JWT 시그니쳐 작성
        //@param string $header
        //@param string $payload
        //@return string base64Signature
        private function createSignature(string $header, string $payload) {
            return MyEncrypt::hashWithSalt(
                env('TOKEN_ALG'), 
                $header.env('TOKEN_SECRET_KEY').$payload, 
                MyEncrypt::makeSalt(env('TOKEN_SALT_LENGTH'))
            );
        }

    // **********토큰 분리 ***********
    //@param string $token
    //@retrun array $header, $payload, $signature
    private function explodeToken($token) {
        $arrToken = explode('.', $token);

        // 토큰 분리 오류 체크
        if(count($arrToken) !== 3) {
            throw new MyAuthException('E23');
        }
        return $arrToken;
    }

    
    }



