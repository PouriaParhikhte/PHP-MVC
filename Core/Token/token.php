<?php

namespace Core\Token;

use Core\Helpers\Configs;

class Token
{
    public static function create(array $input = null)
    {
        $input = Configs::payload($input);
        Create::getInstance($input);
    }

    public static function fetch()
    {
        return Fetch::getInstance()->fetchTokenFromSessionTable();
    }
}
