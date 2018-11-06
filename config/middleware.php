<?php

use Aura\Session\Session;
use Slim\Exception\NotFoundException;
use Slim\Http\Request;
use Slim\Http\Response;
use Symfony\Component\Translation\Translator;

$container = $app->getContainer();

$app->add(function (Request $request, Response $response, $next) use ($container) {
    $locale = $request->getAttribute('language');
    if ($locale == 'de') {
        $locale = 'de_DE';
    }
    $translator = $container->get(Translator::class);
    $resource = __DIR__ . "/../resources/locale/" . $locale . "_messages.mo";
    $translator->setLocale($locale);
    $translator->setFallbackLocales(['en_US']);
    $translator->addResource('mo', $resource, $locale);

    return $next($request, $response);
});

$app->add(function (Request $request, Response $response, $next) use ($container) {
    $language = $request->getAttribute('language');
    $hasLanguage = !empty($language);
    if (empty($language)) {
        // Browser language
        $language = $request->getHeader('accept-language')[0];
        $language = explode(',', $language)[0];
        $language = explode('-', $language)[0];
    }
    $whitelist = [
        'de' => 'de_CH',
        'en' => 'en_US',
    ];
    if (!isset($whitelist[$language])) {
        throw new NotFoundException($request, $response);
    }

    return $next($request, $response);
});

$app->add(function (Request $request, Response $response, $next) {
    $route = $request->getAttribute('route');
    if (empty($route)) {
        return $next($request, $response);
    }
    $language = $route->getArgument('language');
    $request = $request->withAttribute('language', $language);
    $response = $next($request, $response);

    return $response;
});

/**
 * Options middleware
 */
$app->add(function (Request $request, Response $response, $next) {
    $method = $request->getMethod();
    if (strtoupper($method) == 'OPTIONS') {
        return $response->withStatus(200);
    }
    return $next($request, $response);
});

/**
 * For CORS
 */
$app->add(function (Request $request, Response $response, $next) use ($container) {
    /** @var Response $response */
    $response = $next($request, $response);
    $response = $response->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
        ->withHeader('Access-Control-Allow-Headers', 'Authentication, X-App-Language, X-Token, Content-Type')
        ->withHeader('Access-Control-Allow-Credentials', 'true')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    return $response;
});

/**
 * Session Middleware
 *
 * @return Response
 */
$app->add(function (Request $request, Response $response, $next) {
    $session = $this->get(Session::class);
    $response = $next($request, $response);
    $session->commit();
    return $response;
});
