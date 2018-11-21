<?php

namespace App\Service\Validation;


use App\Repository\UserRepository;
use App\Util\ValidationResult;
use Interop\Container\Exception\ContainerException;
use Slim\Container;

/**
 * Class AppValidation
 */
abstract class AppValidation
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * AppValidation constructor.
     * @param Container $container
     * @throws ContainerException
     */
    protected function __construct(Container $container)
    {
        $this->userRepository = $container->get(UserRepository::class);
    }

    /**
     * @param string $userId
     * @param ValidationResult $validationResult
     */
    protected function validateUser(string $userId, ValidationResult $validationResult)
    {
        $exists = $this->userRepository->existsUser($userId);
        if (!$exists) {
            $validationResult->setMessage('You are not a registered user!');
            $validationResult->setError('user', __('Not registered'));
            // TODO add logging
        }
    }

    /**
     * Check if a values string is less than a defined value.
     *
     * @param $value
     * @param $fieldname
     * @param ValidationResult $validationResult
     * @param int $length
     */
    protected function validateLengthMin($value, $fieldname, ValidationResult $validationResult, $length = 3)
    {
        if (strlen(trim($value)) < $length) {
            $validationResult->setError($fieldname, __(sprintf('Required minimum length is %s', $length)));
        }
    }

    /**
     * Check if a values string length is more than a defined value.
     *
     * @param $value
     * @param $fieldname
     * @param ValidationResult $validationResult
     * @param int $length
     */
    protected function validateLengthMax($value, $fieldname, ValidationResult $validationResult, $length = 255)
    {
        if (strlen(trim($value)) > $length) {
            $validationResult->setError($fieldname, __(sprintf('Required maximum length is %s', $length)));
        }
    }

    /**
     * Validate the users permission level.
     *
     * @param string $userId
     * @param string $requiredPermissionLevel
     * @param ValidationResult $validationResult
     */
    protected function validatePermissionLevel(string $userId, string $requiredPermissionLevel, ValidationResult $validationResult)
    {
        if ($this->hasPermissionLevel($userId, $requiredPermissionLevel)) {
            $validationResult->setError('permission', __('You do not have the permission to execute this action'));
        }
    }

    /**
     * Check if the user has the right permission level.
     *
     * @param string $userId
     * @param string $requiredPermissionLevel
     * @return bool
     */
    protected function hasPermissionLevel(string $userId, string $requiredPermissionLevel)
    {
        $level = $this->userRepository->getUserPermissionLevel($userId);
        return $level >= $requiredPermissionLevel;
    }
}
