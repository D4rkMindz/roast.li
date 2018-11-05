<?php


use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Slim\Container;

$container = $app->getContainer();

/**
 * @param Container $container
 * @return UserRepository
 */
$container[UserRepository::class] = function (Container $container) {
    return new UserRepository($container);
};

/**
 * @param Container $container
 * @return PostRepository
 */
$container[PostRepository::class] = function (Container $container) {
    return new PostRepository($container);
};
