<?php
// Routes

$app->get('/', 'App\Action\BlogAction:index')->setName('blog_index');
$app->put('/', 'App\Action\BlogAction:create')->setName('blog_create');
$app->get('/{id}', 'App\Action\BlogAction:get')->setName('blog_item');
