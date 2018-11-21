<?php

namespace App\Service\Validation;

use App\Repository\UserRepository;
use App\Service\Type\RoleLevel;
use App\Util\ValidationResult;
use Slim\Container;

/**
 * Class UserValidation
 * @package App\Service\Validation
 */
class UserValidation extends AppValidation
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserValidation constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->userRepository = $container->get(UserRepository::class);
    }

    /**
     * Validate loading the user.
     *
     * @param string $userId
     * @return ValidationResult
     */
    public function validateGet(string $userId): ValidationResult
    {
        $validationResult = new ValidationResult(__('User does not exist'));
        $this->validateUser($userId, $validationResult);
        return $validationResult;
    }

    /**
     * Validate updating the user.
     *
     * @param string $executorId
     * @param string $userId
     * @param null|string $username
     * @param null|string $password
     * @param null|string $email
     * @param null|string $firstName
     * @param null|string $lastName
     * @param null|string $roleId
     * @return ValidationResult
     */
    public function validateUpdate(string $executorId, string $userId, ?string $username, ?string $password, ?string $email, ?string $firstName, ?string $lastName, ?string $roleId)
    {
        $validationResult = new ValidationResult(__('Please check your data'));
        $this->validateUser($userId, $validationResult);

        if (!empty($username)) {
            $this->validateUsername($username, $validationResult);
        }

        if (!empty($password)) {
            $this->validatePassword($password, $validationResult);
        }

        if (!empty($email)) {
            $this->validateEmail($email, $validationResult);
        }

        if (!empty($firstName)) {
            $this->validateFirstname($firstName, $validationResult);
        }

        if (!empty($lastName)) {
            $this->validatelastname($lastName, $validationResult);
        }

        if (!empty($roleId) && !$this->hasPermissionLevel($executorId, RoleLevel::SUPER_ADMIN)) {
            $validationResult->setError('permission', __('You do not have the permission to execute this action'));
        }

        return $validationResult;
    }

    /**
     * Validate registration.
     *
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @return ValidationResult
     */
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

    /**
     * Validate deletion.
     *
     * @param string $userId
     * @param string $executorId
     * @return ValidationResult
     */
    public function validateDeletion(string $userId, string $executorId): ValidationResult
    {
        $validationResult = new ValidationResult(__('Something went wrong'));
        $this->validateUser($userId, $validationResult);
        if ((int)$executorId !== (int)$userId) {
            $this->validatePermissionLevel($executorId, RoleLevel::SUPER_ADMIN, $validationResult);
        }

        return $validationResult;
    }

    /**
     * Validate username.
     *
     * @param string $username
     * @param ValidationResult $validationResult
     */
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
        if (preg_match('/((^|, )(admin|user|nicola|bjoern|björn|penis|69|420))+$/', $username)) {
            $validationResult->setError('username', __('OOOOH you filthy one...'));
        }
    }

    /**
     * Validate password
     *
     * @param string $password
     * @param ValidationResult $validationResult
     */
    private function validatePassword(string $password, ValidationResult $validationResult)
    {
        $this->validateLengthMax($password, 'password', $validationResult);
        $this->validateLengthMin($password, 'password', $validationResult, 6);
        if (!preg_match('/[A-Za-z]/', $password)) {
            $validationResult->setError('password', __('Password must contain at least one uppercase and one lowercase letter'));
        }
    }

    /**
     * Validate email
     *
     * @param string $email
     * @param ValidationResult $validationResult
     */
    private function validateEmail(string $email, ValidationResult $validationResult)
    {
        if (!is_email($email)) {
            $validationResult->setError('email', __('Not a valid email address'));
        }
        if ($this->userRepository->existsUserByEmail($email)) {
            $validationResult->setError('email', __('Email already registered'));
        }
    }

    /**
     * Validate firstname.
     *
     * @param string $firstName
     * @param ValidationResult $validationResult
     */
    private function validateFirstname(string $firstName, ValidationResult $validationResult)
    {
        $this->validateLengthMax($firstName, 'firstname', $validationResult, 80);
        $this->validateLengthMin($firstName, 'firstname', $validationResult, 3);
    }

    /**
     * Validate lastname.
     *
     * @param string $lastName
     * @param ValidationResult $validationResult
     */
    private function validateLastname(string $lastName, ValidationResult $validationResult)
    {
        $this->validateLengthMax($lastName, 'lastname', $validationResult, 80);
        $this->validateLengthMin($lastName, 'lastname', $validationResult, 3);
    }
}
