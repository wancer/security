<?php

// login: admin'-- OR 1=1 #'
// login: ' OR 1=1 --'

$app->get('/',\Action\IndexAction::class);

$app->post('/login',\Action\LoginAction::class);
$app->get('/logout',\Action\LogoutAction::class);

// 0 UNION SELECT id,login,password FROM users
$app->get('/data',\Action\DataAction::class);
$app->get('/data/del/{id}',\Action\DataDeleteAction::class);
$app->post('/data',\Action\DataSaveAction::class);
