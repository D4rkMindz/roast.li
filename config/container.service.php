<?php

use App\Service\Validation\PostValidation;
use App\Service\Validation\UserValidation;
use Slim\Container;

$container = $app->getContainer();

$container[PostValidation::class] = function (Container $container) {
  return new PostValidation($container);
};
$container[UserValidation::class] = function (Container $container) {
  return new UserValidation($container);
};