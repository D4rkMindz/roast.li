<?php

namespace App\Exception;


use App\Type\AuthenticationExceptionType;
use DomainException;

class AuthenticationException extends DomainException
{
    private $typeCode;

    public function __construct(string $message, $typeCode = AuthenticationExceptionType::CREDENTIALS_INVALID)
    {
        parent::__construct($message);
        $this->typeCode = $typeCode;
    }

    public function getTypeCode()
    {
        return $this->typeCode;
    }
}
