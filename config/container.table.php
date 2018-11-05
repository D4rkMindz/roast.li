<?php

use App\Table\LikedPostTable;
use App\Table\PostTable;
use App\Table\RoleTable;
use App\Table\UserTable;
use Cake\Database\Connection;
use Slim\Container;

$container = $app->getContainer();

/**
 * @param Container $container
 * @return UserTable
 */
$container[UserTable::class] = function (Container $container) {
    return new UserTable($container->get(Connection::class));
};

/**
 * @param Container $container
 * @return PostTable
 */
$container[PostTable::class] = function (Container $container) {
    return new PostTable($container->get(Connection::class));
};

/**
 * @param Container $container
 * @return RoleTable
 */
$container[RoleTable::class] = function (Container $container) {
    return new RoleTable($container->get(Connection::class));
};

/**
 * @param Container $container
 * @return LikedPostTable
 */
$container[LikedPostTable::class] = function (Container $container) {
    return new LikedPostTable($container->get(Connection::class));
};
