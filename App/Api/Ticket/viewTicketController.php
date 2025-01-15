<?php

namespace App\Api\Ticket;

use App\Models\Ticket\ViewTicket;
use Core\Controller;
use Core\Helpers\Helper;
use Core\Menu\UserPanelMenu;
use Core\Helpers\Token;
use Core\Token\FetchToken;
use Core\View;
use Exception;

class ViewTicketController extends Controller
{
    public function index()
    {
        try {
            $input = [
                'menu' => UserPanelMenu::panelMenuBuilder(),
                'ticket' => ViewTicket::fetch(end($this->params), FetchToken::getInstance()->jwt('userId')) ?? Helper::notFound()
            ];
            View::render(Helper::getUrlWithoutQueryString(), $input);
        } catch (Exception $exception) {
            exit($exception->getMessage());
        }
    }
}
