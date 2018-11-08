<?php

namespace App\Controller;


use App\Repository\UserRepository;
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
     * @var UserRepository
     */
    private $userRepository;

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
        $this->userRepository = $container->get(UserRepository::class);
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
            $userId = $this->userRepository->getIdByUsername($username);
            $this->setLoggedIn($userId);
            return $this->json($response, ['success' => true]);
        }
        return $this->json($response, ['success' => false]);
    }

    /**
     * Logout action.
     *
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function logoutAction(Request $request, Response $response): ResponseInterface
    {
        if ($this->setLoggedOut()) {
            return $this->json($response, ['success' => true]);
        }
        return $this->json($response, ['success' => false]);
    }
}
