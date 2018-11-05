<?php
/**
 * Created by PhpStorm.
 * User: bjorn
 * Date: 31.10.18
 * Time: 23:16
 */

namespace App\Service;


use App\Exception\AuthenticationException;
use App\Repository\UserRepository;
use App\Type\AuthenticationExceptionType;
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
     * @throws AuthenticationException
     */
    public function authenticate(string $username, string $password)
    {
        $hash = $this->userRepository->getPasswordByUsername($username);
        if (password_verify($password, $hash)) {
            return true;
        }
        throw new AuthenticationException(__('Username or password invalid'), AuthenticationExceptionType::CREDENTIALS_INVALID);
    }
}
