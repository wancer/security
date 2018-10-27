<?php

namespace Action;

use Slim\Http\Request;
use Slim\Http\Response;

class DataDeleteAction extends AbstractAction
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $user = $this->session->get('user');

        $sql = sprintf('DELETE FROM money WHERE id=%s AND user_id=%s', $id, $user['id']);

        $this->db->exec($sql);

        return $response->withRedirect('/data');
    }

}