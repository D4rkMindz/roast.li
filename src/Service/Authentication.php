<?php

namespace App\Service;


use App\Exception\AuthenticationException;
use App\Repository\UserRepository;
use Slim\Container;

class Authentication
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * Authentication constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    {
        $this->userRepository = $container->get(UserRepository::class);
    }

    /**
     * Authenticate user.
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function authenticate(string $username, string $password): bool
    {
        $hash = $this->userRepository->getPasswordByUsername($username);
        if (password_verify($password, $hash)) {
            return true;
        }
        return false;
    }
}
