<?php

namespace Core\Token;

use Core\Crud\InsertOrUpdate;
use Core\Helpers\Configs;
use Firebase\JWT\JWT;

class Create extends InsertOrUpdate
{
    public function __construct(array $input)
    {
        if ($jwt = Token::fetch())
            $payload = array_merge((array)$jwt, $input);
        $token['secretKey'] = Configs::secretKey($payload['iat'], $payload['exp']);
        $token['token'] = JWT::encode($payload, $token['secretKey'], 'HS256');
        $token['userIp'] = $_SERVER['REMOTE_ADDR'];
        $this->insertOrUpdate($token);
    }
}
