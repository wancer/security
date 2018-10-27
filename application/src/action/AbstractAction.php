<?php

namespace Action;

use Psr\Container\ContainerInterface;

class AbstractAction
{
    protected $container;
    /* @var $renderer \Slim\Views\PhpRenderer */
    protected $renderer;
    /* @var $session \SlimSession\Helper */
    protected $session;
    /* @var $db \PDO */
    protected $db;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->session = $container->get('session');
        $this->renderer = $container->get('renderer');
        $this->db = $container->get('db');
    }
}