<?php

namespace Action;

use Slim\Http\Request;
use Slim\Http\Response;

class IndexAction extends AbstractAction
{
    public function __invoke(Request $request, Response $response)
    {
        $user = $this->session->get('user');
        $error = $this->session->get('error');
        $this->session->delete('error');

        if ($user)
        {
            return $response->withRedirect('/data');
        }

        return $this->renderer->render(
            $response,
            'login.phtml',
            [
                'user' => $user,
                'error' => $error,
            ]
        );
    }
}