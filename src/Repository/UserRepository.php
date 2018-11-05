<?php
/**
 * Created by PhpStorm.
 * User: bjorn
 * Date: 31.10.18
 * Time: 22:56
 */

namespace App\Repository;


use App\Table\UserTable;
use DomainException;
use Interop\Container\Exception\ContainerException;
use Slim\Container;

/**
 * Class UserRepository
 */
class UserRepository extends AppRepository
{
    /**
     * @var UserTable $userTable
     */
    private $userTable;

    /**
     * UserRepository constructor.
     *
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    {
        $this->userTable = $container->get(UserTable::class);
    }

    /**
     * Check if a user exists.
     *
     * @param string $userId
     * @return bool
     */
    public function existsUser(string $userId)
    {
        return $this->userTable->exist('id', $userId);
    }

    /**
     * Get a password by username
     *
     * @param string $username
     * @return string
     */
    public function getPasswordByUsername(string $username): string
    {
        $where = ['username' => $username];
        if (is_email($username)) {
            $where = ['email' => $username];
        }
        $query = $this->userTable->newSelect();
        $query->select(['password'])->where($where);
        $row = $query->execute()->fetch('assoc');
        if (!empty($row)) {
            return $row['password'];
        }
        throw new DomainException(__('Username not found'));
    }
}
