<?php

use Aura\Session\Segment;
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
 * Authentication middleware
 */
$app->add(function (Request $request, Response $response, $next) use ($container) {
    /** @var Session $session */
    $session = $container->get(Session::class);
    $loggedIn = $session->getSegment('app')->get('logged_in');
    $allowedRoutes = $container->get('settings')->get('authentication')['allowed'];
    $route = $request->getUri()->getPath();
    $method = strtoupper($request->getMethod());
    $allowed = false;
    foreach ($allowedRoutes as $allowedRoute => $allowedMethods) {
        if (strtolower($allowedRoute) === strtolower($route) && isset($allowedMethods[$method])) {
            $allowed = true;
            break;
        }
    }
    if ($allowed|| $loggedIn) {
        return $next($request, $response);
    }
    return $response->withStatus(401);
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
    $config = $container->get('settings')->get('cors');
    $client = $config['client'];
    $response = $response->withHeader('Access-Control-Allow-Origin', $client)
        ->withHeader('Access-Control-Allow-Headers', 'X-Authenticated, X-App-Language, X-Token, Content-Type')
        ->withHeader('Access-Control-Expose-Headers', 'X-Authenticated')
        ->withHeader('Access-Control-Allow-Credentials', 'true')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    return $response;
});

/**
 * Session Middleware
 *
 * @return Response
 */
$app->add(function (Request $request, Response $response, $next) use ($container) {
    /** @var Session $session */
    $session = $container->get(Session::class);
    /** @var Response $response */
    $response = $next($request, $response);
    $response = $response->withHeader('X-Authenticated', $session->getSegment('app')->get('logged_in'));
    $session->commit();
    return $response;
});
