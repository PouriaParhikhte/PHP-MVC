<?php

namespace App\Api\Panel;

use Core\Controller;
use Core\Helpers\Helper;
use Core\Token\Token;

class PanelLogoutController extends Controller
{
    public function logout()
    {
        Token::removeUserIdAndRoleId();
        Helper::redirect();
    }
}
