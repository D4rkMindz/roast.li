<?php

namespace App\Service\Type;

/**
 * Class RoleLevel
 */
class RoleLevel
{
    public const SUPER_ADMIN = 64;
    public const ADMIN = 32;
    public const USER = 16;
    public const GUEST = 8;
    public const ANONYMOUS = 0;
}
