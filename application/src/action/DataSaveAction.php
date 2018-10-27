<?php

namespace Action;

use Slim\Http\Request;
use Slim\Http\Response;

class DataSaveAction extends AbstractAction
{
    public function __invoke(Request $request, Response $response)
    {
        $amount = $request->getParam('amount');
        $user_id = $request->getParam('user_id');

        $sql = sprintf('INSERT INTO money(user_id, amount) VALUES (%s, "%s")',
            $user_id, $amount);

        $this->db->exec($sql);

        return $response->withRedirect('/data');
    }

}