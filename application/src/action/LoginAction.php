<?php

namespace Action;

use Slim\Http\Request;
use Slim\Http\Response;

class LoginAction extends AbstractAction
{
    function __invoke(Request $request, Response $response)
    {
        $login = $request->getParam('login');
        $pass = $request->getParam('password');
        $passHash = md5($pass);

        $sql = sprintf("SELECT * FROM users WHERE login='%s' AND password='%s'", $login, $passHash);
        $user = $this->db->query($sql)->fetch(\PDO::FETCH_ASSOC);
        if ($user)
        {
            $this->session->set('user', $user);
        }
        else
        {
            $this->session->set('error', 'Wrong credentials');
        }

        return $response->withRedirect('/');
    }
}