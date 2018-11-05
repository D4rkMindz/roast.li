<?php

namespace App\Controller;


use App\Service\Authentication;
use Interop\Container\Exception\ContainerException;
use Psr\Http\Message\ResponseInterface;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class AuthenticationController
 */
class AuthenticationController extends AppController
{
    /**
     * @var Authentication
     */
    private $authentication;

    /**
     * AuthenticationController constructor.
     *
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->authentication = $container->get(Authentication::class);
    }

    /**
     * Index action.
     *
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function indexAction(Request $request, Response $response): ResponseInterface
    {
        return $this->render($response, $request, 'Authentication/login.twig');
    }

    /**
     * Login action.
     *
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function loginAction(Request $request, Response $response): ResponseInterface
    {
        $username = $request->getParsedBodyParam('username');
        $password = $request->getParsedBodyParam('password');
        $canLogin = $this->authentication->authenticate($username, $password);
        if ($canLogin) {
            $this->setLoggedIn();
            return $this->redirect($response, $this->router->pathFor('root'));
        }
        return $this->render($response,$request, 'Authentication/login.twig');
    }
}
