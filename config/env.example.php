<?php
$env['displayErrorDetails'] = true;

$env['db']['database'] = 'mydb';
$env['db']['charset'] = 'utf8';
$env['db']['encoding'] = 'utf8';
$env['db']['collation'] = 'utf8_unicode_ci';
$env['db']['host'] = '';
$env['db']['port'] = '';
$env['db']['username'] = '';
$env['db']['password'] = '';

$env['db_test']['host'] = '127.0.0.1';
$env['db_test']['port'] = '3306';
$env['db_test']['username'] = 'root';
$env['db_test']['password'] = '';

$env['mailgun']['from'] = '';
$env['mailgun']['apikey'] = '';
$env['mailgun']['domain'] = '';

$env['twig']['assetCache'] ['minify'] = false;
$env['twig']['assetCache'] ['cache_enabled'] = false;
$env['twig']['autoReload'] = true;

$env['cors']['client'] = 'https://nicipedia.sexy';

return $env;