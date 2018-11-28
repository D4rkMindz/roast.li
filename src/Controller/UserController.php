<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Type\RoleLevel;
use App\Service\Validation\UserValidation;
use App\Util\ValidationResult;
use Interop\Container\Exception\ContainerException;
use Psr\Http\Message\ResponseInterface;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class UserController
 */
class UserController extends AppController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var UserValidation
     */
    private $userValidation;

    /**
     * UserController constructor.
     *
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->userRepository = $container->get(UserRepository::class);
        $this->userValidation = $container->get(UserValidation::class);
    }

    /**
     * Create/register user action
     *
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function createUserAction(Request $request, Response $response)
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

    /**
     * Get a single user.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return ResponseInterface
     */
    public function getUserAction(Request $request, Response $response, array $args): ResponseInterface
    {
        $userId = $args['user_id'];
        $validationResult = $this->userValidation->validateGet($userId);
        if ($validationResult->fails()) {
            $responseData = [
                'success' => false,
                'validation' => $validationResult->toArray(),
            ];

            return $this->json($response, $responseData, 422);
        }

        $user = $this->userRepository->getUser($userId);
        if (empty($user)) {
            $message = __('User not found');
            $validationResult = new ValidationResult($message);
            $validationResult->setError('user', $message);
            $responseData = [
                'success' => false,
                'validation' => $validationResult->toArray(),
            ];

            return $this->json($response, $responseData, 404);
        }

        $responseData = [
            'success' => true,
            'user' => $user,
        ];

        return $this->json($response, $responseData);
    }

    /**
     * Get all users.
     *
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function getAllUsersAction(Request $request, Response $response): ResponseInterface
    {
        $users = $this->userRepository->getAllUsers();
        if (empty($users)) {
            $message = __('Users not found');
            $validationResult = new ValidationResult($message);
            $validationResult->setError('user', $message);
            $responseData = [
                'success' => false,
                'validation' => $validationResult->toArray(),
            ];

            return $this->json($response, $responseData, 404);
        }

        $responseData = [
            'success' => true,
            'users' => $users,
        ];

        return $this->json($response, $responseData);
    }

    /**
     * Update a user.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return ResponseInterface
     */
    public function updateUserAction(Request $request, Response $response, array $args): ResponseInterface
    {
        $userId = $args['user_id'];
        $executorId = $this->getUserId();
        $json = $request->getBody()->__toString();
        $data = json_decode($json, true);
        $username = array_value('username', $data);
        $oldPassword = array_value('old_password', $data);
        $password = array_value('password', $data);
        $email = array_value('email', $data);
        $firstName = array_value('first_name', $data);
        $lastName = array_value('last_name', $data);
        $rolePosition = array_value('role_position', $data);

        $validationResult = $this->userValidation->validateUpdate(
            $executorId,
            $userId,
            $username,
            $oldPassword,
            $password,
            $email,
            $firstName,
            $lastName,
            $rolePosition
        );

        if ($validationResult->fails()) {
            $responseData = [
                'success' => false,
                'validation' => $validationResult->toArray(),
            ];

            return $this->json($response, $responseData, 422);
        }

        $updated = $this->userRepository->updateUser(
            $executorId,
            $userId,
            $username,
            $password,
            $email,
            $firstName,
            $lastName
        );

        if ($updated) {
            $this->regenerateSessionId();

            return $this->json($response, ['success' => true]);
        }

        return $this->json($response, ['success' => false]);
    }

    /**
     * Delete a user.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return ResponseInterface
     */
    public function deleteUserAction(Request $request, Response $response, array $args): ResponseInterface
    {
        $userId = $args['user_id'];
        $validationResult = $this->userValidation->validateDeletion($userId, $this->getUserId());
        if ($validationResult->fails()) {
            $responseData = [
                'success' => false,
                'validation' => $validationResult->toArray(),
            ];

            return $this->json($response, $responseData, 422);
        }

        $deleted = $this->userRepository->archiveUser($userId, $this->getUserId());
        if ($deleted) {
            $this->regenerateSessionId();

            return $this->json($response, ['success' => true]);
        }

        return $this->json($response, ['success' => false]);
    }
}
