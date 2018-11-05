<?php

use App\Service\Validation\PostValidation;
use Slim\Container;

$container = $app->getContainer();

$container[PostValidation::class] = function (Container $container) {
  return new PostValidation($container);
};