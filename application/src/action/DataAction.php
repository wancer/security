<?php

namespace Action;

use Slim\Http\Request;
use Slim\Http\Response;

class DataAction extends AbstractAction
{
    public function __invoke(Request $request, Response $response)
    {
        $user = $this->session->get('user');
        if (!$user)
        {
            $this->session->set('error', 'Requires authorization');

            return $response->withRedirect('/');
        }

        $amount = $request->getParam('amount');

        $sql = sprintf("SELECT * FROM money WHERE user_id='%s'", $user['id']);
        if ($amount)
        {
            $sql .= " AND amount=" . $amount;
        }
        $res = $this->db->query($sql);
        if ($res)
        {
            $data = $res->fetchAll(\PDO::FETCH_NUM);
        }
        else
        {
            $data = [];
        }

        return $this->renderer->render(
            $response,
            'data.phtml',
            [
                'data' => $data,
                'user' => $user,
                'amount' => $amount,
            ]
        );
    }
}