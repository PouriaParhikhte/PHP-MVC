<?php

namespace Core\Token;

use Core\Crud\Select;
use Core\Helpers\Helper;
use Core\Helpers\mysqlClause\Limit;
use Core\Helpers\mysqlClause\Where;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Fetch extends Select
{
    protected $table = 'session';
    use Where, Limit;

    public function fetchTokenFromSessionTable()
    {
        if ($token = $this->select()->where(['userIp', Helper::userIp()])->first())
            return JWT::decode($token->token, new Key($token->secretKey, 'HS256'));
    }
}
