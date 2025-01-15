<?php

namespace Core\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

trait TokenDecoder
{
    public function decodeToken($token, int $toArray = 0)
    {
        try {
            $tokenArr = explode('.', $token);
            $tokenArr = base64_decode($tokenArr[1]);
            $json = json_decode($tokenArr, $toArray);
            return JWT::decode($token, new Key(md5($json['iat']), 'HS256'));
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }
}
