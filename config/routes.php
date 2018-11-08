<?php
$language = '{language:(?:de|en)}';

$app->get('/', 'App\Controller\IndexController:indexAction')->setName('root');
$app->get('/error', 'App\Controller\ErrorController:notFoundAction')->setName('notFound');
$app->post('/api/user/auth', 'App\Controller\AuthenticationController:loginAction')->setName('login');
$app->get('/api/posts/hot', 'App\Controller\PostController:getHotPostsAction')->setName('hot');
$app->get('/api/posts/new', 'App\Controller\PostController:getNewPostsAction')->setName('new');
$app->get('/api/posts/{post_id}', 'App\Controller\PostController:getPostAction')->setName('getPost');
$app->get('/api/posts/{post_id}/like', 'App\Controller\PostController:getLikesForPostAction')->setName('getLikes');
$app->put('/api/posts/{post_id}/like', 'App\Controller\PostController:likePostAction')->setName('like');
$app->put('/api/posts/{post_id}/unlike', 'App\Controller\PostController:unlikePostAction')->setName('unlike');
