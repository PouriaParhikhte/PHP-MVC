<?php

namespace App\Models\User;

use Core\Crud\Select;
use Core\Helpers\mysqlClause\Limit;
use Core\Helpers\mysqlClause\Where;

class Login extends Select
{
    use Where, Limit;
    protected $table = 'user';

    public function fetchUser($username)
    {
        return (new self)->select()->where(['username', $username])->where(['roleId', 2])->first();
    }
}
