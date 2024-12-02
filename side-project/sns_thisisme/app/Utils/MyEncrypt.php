<?php
namespace App\Utils;

use Illuminate\Support\Str;

class MyEncrypt {
    public function base64UrlEncode(string $json) {
        return rtrim(strtr(base64_encode($json), '+/', '-_'), '=');
    }

    public function base64UrlDecode(string $base64) {
        return base64_decode(strtr($base64, '-_','+/'));
    }

    public function makeSalt($slatLength) {
        return Str::random($slatLength);

    }

    public function hashWithSalt(string $alg, string $str, string $salt) {
        return hash($alg, $str).$salt;
    }

    public function subSalt(string $signature, int $saltlength) {
        return mb_substr($signature, 0, (-1*$saltlength));
    }
}