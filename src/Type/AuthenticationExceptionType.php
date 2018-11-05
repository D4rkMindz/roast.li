<?php
/**
 * Created by PhpStorm.
 * User: bjorn
 * Date: 31.10.18
 * Time: 23:11
 */

namespace App\Type;


class AuthenticationExceptionType
{
    const VALID = 0;
    const CREDENTIALS_INVALID = 1;
    const USER_NOT_FOUND = 2;
}
