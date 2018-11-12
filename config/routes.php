<?php
$language = '{language:(?:de|en)}';

$app->get('/', 'App\Controller\IndexController:indexAction')->setName('root');
$app->get('/error', 'App\Controller\ErrorController:notFoundAction')->setName('notFound');
$app->post('/user', 'App\Controller\AuthenticationController:registerAction')->setName('register');
$app->post('/user/auth', 'App\Controller\AuthenticationController:loginAction')->setName('login');
$app->delete('/user/auth', 'App\Controller\AuthenticationController:logoutAction')->setName('logout');
$app->get('/posts/hot', 'App\Controller\PostController:getHotPostsAction')->setName('hot');
$app->get('/posts/new', 'App\Controller\PostController:getNewPostsAction')->setName('new');
$app->get('/posts/{post_id}', 'App\Controller\PostController:getPostAction')->setName('getPost');
$app->delete('/posts/{post_id}', 'App\Controller\PostController:deletePostAction')->setName('deletePost');
$app->get('/posts/{post_id}/like', 'App\Controller\PostController:getLikesForPostAction')->setName('getLikes');
$app->put('/posts/{post_id}/like', 'App\Controller\PostController:likePostAction')->setName('like');
$app->put('/posts/{post_id}/unlike', 'App\Controller\PostController:unlikePostAction')->setName('unlike');
$app->post('/posts', 'App\Controller\PostController:createPostAction')->setName('createPost');
