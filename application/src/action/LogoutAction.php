<?php

namespace Action;

use Slim\Http\Request;
use Slim\Http\Response;

class LogoutAction extends AbstractAction
{
    public function __invoke(Request $request, Response $response)
    {
        $this->session->delete('user');

        return $response->withRedirect('/');
    }
}