<?php
// Application middleware

$app->add(new \Slim\Middleware\Session([
    'name' => 'dummy_session',
]));