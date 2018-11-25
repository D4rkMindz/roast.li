<?php

use Aura\Session\Session;
use Symfony\Component\Translation\Translator;

$config = [];

$applicationName = 'Nicipedia';

$config = [
    'displayErrorDetails' => true,
    'determineRouteBeforeAppMiddleware' => true,
    'addContentLengthHeader' => false,
];

$config[Session::class] = [
    'name' => $applicationName,
    'cache_expire' => 14400,
];

$config[Translator::class] = [
    'locale' => 'de_CH',
    'path' => __DIR__ . '/../resources/locale',
];

$config['migrations'] = __DIR__ . '/../resources/migrations';

$config['db'] = [
    'database' => 'modul-151_projekt',
    'charset' => 'utf8',
    'encoding' => 'utf8',
    'collation' => 'utf8_unicode_ci',
];

$config['db_test'] = [
    'database' => 'modul-151_projekt_test',
    'charset' => 'utf8',
    'encoding' => 'utf8',
    'collation' => 'utf8_unicode_ci',
];

$config['twig'] = [
    'viewPath' => __DIR__ . '/../templates',
    'cachePath' => __DIR__ . '/../tmp/cache/twig',
    'autoReload' => false,
    'assetCache' => [
        'path' => __DIR__ . '/../public/assets',
        // Cache settings
        'cache_enabled' => true,
        'cache_path' => __DIR__ . '/../tmp/cache',
        'cache_name' => 'assets',
        'cache_lifetime' => 0,
    ],
];

$config['session'] = [
    'name' => 'app_template',
    'autorefresh' => true,
    'lifetime' => '2 hours',
    'path' => '/', //default
    'domain' => 'nicipedia', //default
    'secure' => true, //default
    'httponly' => false, //default
];

$config['logger'] = [
    'main' => 'app',
];

$config['cors'] = [
    'client' => 'http://localhost:4200',
];

$config['authentication'] = [
    'allowed' => [
        '/' => ['GET' => 1],
        '/posts/hot' => ['GET' => 1],
        '/posts/new' => ['GET' => 1],
        '/users/auth' => ['POST' => 1],
        '/users' => ['POST' => 1],
    ],
];

return $config;