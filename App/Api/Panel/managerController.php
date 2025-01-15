<?php

namespace App\Api\Panel;

use Core\Controller;
use Core\Helpers\Helper;
use Core\Token\FetchToken;
use Core\View;
use Exception;

class ManagerController extends Controller
{
    public function index()
    {
        try {
            $jwt = FetchToken::getInstance()->previousToken();
            $page = (!isset($jwt->userId) && isset($jwt->roleId)) ? 'api/panel/dashboard' : 'api/panel/manager';
            View::render($page);
        } catch (Exception $exception) {
            Helper::sendMessageOrRedirect($exception->getMessage(), $exception->getCode());
        }
    }
}
