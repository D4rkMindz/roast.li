<?php

namespace App\Type;

/**
 * Class RoleLevel
 */
class RoleLevel
{
    /**
     * The role level of a super adminstrator
     */
    public const SUPER_ADMIN = 64;

    /**
     * The role level of an administrator
     */
    public const ADMIN = 32;

    /**
     * The role level of a user
     */
    public const USER = 16;

    /**
     * The role level of a guest
     */
    public const GUEST = 8;

    /**
     * The role level of an anonymous user
     */
    public const ANONYMOUS = 0;
}
