<?php
/**
 * Created by PhpStorm.
 * User: bjorn
 * Date: 09.11.18
 * Time: 21:42
 */

namespace App\Service\Validation;


use App\Repository\UserRepository;
use App\Util\ValidationResult;
use Slim\Container;

class UserValidation extends AppValidation
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->userRepository = $container->get(UserRepository::class);
    }

    public function validateRegister(string $username, string $password, string $email, string $firstName, string $lastName): ValidationResult
    {
        $validationResult = new ValidationResult(__('Your registration is not correct'));
        $this->validateUsername($username, $validationResult);
        $this->validatePassword($password, $validationResult);
        $this->validateEmail($email, $validationResult);
        $this->validateFirstname($firstName, $validationResult);
        $this->validateLastname($lastName, $validationResult);

        return $validationResult;
    }

    private function validateUsername(string $username, ValidationResult $validationResult)
    {
        $this->validateLengthMax($username, 'username', $validationResult, 80);
        $this->validateLengthMin($username, 'username', $validationResult, 3);
        if ($validationResult->fails()) {
            return;
        }
        if ($this->userRepository->existsUserByUsername($username)) {
            $validationResult->setError('username', __('Username already taken'));
        }
    }

    private function validatePassword(string $password, ValidationResult $validationResult)
    {
        $this->validateLengthMax($password, 'password', $validationResult);
        $this->validateLengthMin($password, 'password', $validationResult, 6);
        if (!preg_match('/[A-Za-z]/', $password)) {
            $validationResult->setError('password', __('Password must contain at least one uppercase and one lowercase letter'));
        }
    }

    private function validateEmail(string $email, ValidationResult $validationResult)
    {
        if (!is_email($email)) {
            $validationResult->setError('email', __('Not a valid email address'));
        }
        if ($this->userRepository->existsUserByEmail($email)) {
            $validationResult->setError('email', __('Email already registered'));
        }
    }

    private function validateFirstname(string $firstName, ValidationResult $validationResult)
    {
        $this->validateLengthMax($firstName, 'firstname', $validationResult, 80);
        $this->validateLengthMin($firstName, 'firstname', $validationResult, 3);
    }

    private function validateLastname(string $lastName, ValidationResult $validationResult)
    {
        $this->validateLengthMax($lastName, 'lastname', $validationResult, 80);
        $this->validateLengthMin($lastName, 'lastname', $validationResult, 3);
    }

}