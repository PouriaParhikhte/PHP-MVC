<?php

namespace App\Api\Ticket;

use App\Models\Ticket\Tickets;
use Core\Controller;
use Core\Helpers\Helper;
use Core\Menu\UserPanelMenu;
use Core\Token\FetchToken;
use Core\View;
use Exception;

class TicketIndexController extends Controller
{
    public function index()
    {
        try {
            $tickets = Tickets::index(FetchToken::getInstance()->jwt('userId'));
            $input = [
                'menu' => UserPanelMenu::panelMenuBuilder(),
                'tickets' => $tickets->result ?? null,
                'pagination' => $tickets->pagination ?? null
            ];
            // if (is_numeric(end($this->params)))
            //     array_pop($this->params);
            View::render($_GET['url'], $input);
        } catch (Exception $exception) {
            Helper::sendMessageOrRedirect($exception->getMessage(), $exception->getCode(), 'ticketErrorMessage');
        }
    }
}
