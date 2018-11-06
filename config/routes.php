<?php
$language = '{language:(?:de|en)}';

$app->get('/', 'App\Controller\IndexController:indexAction')->setName('root');
$app->get('/error', 'App\Controller\ErrorController:notFoundAction')->setName('notFound');
$app->get('/login', 'App\Controller\AuthenticationController:loginAction')->setName('login');
$app->get('/api/posts/hot', 'App\Controller\PostController:getHotPostsAction')->setName('hot');
$app->get('/api/posts/new', 'App\Controller\PostController:getNewPostsAction')->setName('new');
$app->put('/api/posts/{post_id}/like', 'App\Controller\PostController:likePostAction')->setName('like');