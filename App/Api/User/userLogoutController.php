<?php

namespace App\Api\User;

use Core\Controller;
use Core\Helpers\Helper;
use Core\Token\Token;

class UserLogoutController extends Controller
{
    public function logout()
    {
        Token::removeUserIdAndRoleId();
        Helper::redirect();
    }
}
