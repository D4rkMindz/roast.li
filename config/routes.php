<?php
$language = '{language:(?:de|en)}';

$app->get('/', 'App\Controller\IndexController:indexAction')->setName('root');
$app->get('/error', 'App\Controller\ErrorController:notFoundAction')->setName('notFound');
$app->post('/users/auth', 'App\Controller\AuthenticationController:loginAction')->setName('loginUser');
$app->delete('/users/auth', 'App\Controller\AuthenticationController:logoutAction')->setName('logoutUser');
$app->get('/users/{user_id}', 'App\Controller\UserController:getUserAction')->setName('getUser');
$app->put('/users/{user_id}', 'App\Controller\UserController:updateUserAction')->setName('updateUser');
$app->delete('/users/{user_id}', 'App\Controller\UserController:deleteUserAction')->setName('deleteUser');
$app->get('/users', 'App\Controller\UserController:getAllUsersAction')->setName('getAllUsers');
$app->post('/users', 'App\Controller\UserController:createUserAction')->setName('registerUser');
$app->get('/posts/hot', 'App\Controller\PostController:getHotPostsAction')->setName('geNewPosts');
$app->get('/posts/new', 'App\Controller\PostController:getNewPostsAction')->setName('getHotPosts');
$app->get('/posts/{post_id}', 'App\Controller\PostController:getPostAction')->setName('getPost');
$app->delete('/posts/{post_id}', 'App\Controller\PostController:deletePostAction')->setName('deletePost');
$app->get('/posts/{post_id}/like', 'App\Controller\PostController:getLikesForPostAction')->setName('getLikes');
$app->put('/posts/{post_id}/like', 'App\Controller\PostController:likePostAction')->setName('like');
$app->put('/posts/{post_id}/unlike', 'App\Controller\PostController:unlikePostAction')->setName('unlike');
$app->post('/posts', 'App\Controller\PostController:createPostAction')->setName('createPost');
$app->get('/roles', 'App\Controller\RoleController:getAllRolesAction')->setName('getAllRoles');
