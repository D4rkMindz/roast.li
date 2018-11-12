<?php

namespace App\Controller;


use App\Repository\UserRepository;
use App\Service\Authentication;
use App\Service\Validation\UserValidation;
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
     * @var UserValidation
     */
    private $userValidation;

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
        $this->userValidation = $container->get(UserValidation::class);
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

    /**
     * Create a user.
     *
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function registerAction(Request $request, Response $response): ResponseInterface
    {
        $json = $request->getBody()->__toString();
        $data = json_decode($json, true);
        $username = (string)$data['username'];
        $password = (string)$data['password'];
        $email = (string)$data['email'];
        $firstName = (string)$data['firstname'];
        $lastName = (string)$data['lastname'];

        $validationResult = $this->userValidation->validateRegister(
            $username,
            $password,
            $email,
            $firstName,
            $lastName
        );

        if ($validationResult->fails()) {
            $responseData = [
                'success' => false,
                'validation' => $validationResult->toArray(),
            ];
            return $this->json($response, $responseData, 422);
        }

        $userId = $this->userRepository->createUser(
            $username,
            $password,
            $email,
            $firstName,
            $lastName
        );

        if ($userId) {
            $this->setLoggedIn($userId);
            return $this->json($response, ['success' => true]);
        }

        return $this->json($response, ['success' => false]);
    }
}
