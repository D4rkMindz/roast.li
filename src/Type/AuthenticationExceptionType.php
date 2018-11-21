<?php

namespace App\Type;


class AuthenticationExceptionType
{
    const VALID = 0;
    const CREDENTIALS_INVALID = 1;
    const USER_NOT_FOUND = 2;
}
