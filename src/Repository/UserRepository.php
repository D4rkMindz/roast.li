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
     * Check if a user exists.
     *
     * @param string $username
     * @return bool
     */
    public function existsUserByUsername(string $username)
    {
        return $this->userTable->exist('username', strtolower($username));
    }

    /**
     * Check if a user exists.
     *
     * @param string $username
     * @return bool
     */
    public function existsUserByEmail(string $email)
    {
        return $this->userTable->exist('email', strtolower($email));
    }

    /**
     * Get a password by username.
     *
     * @param string $username
     * @return string
     * @throws DomainException
     */
    public function getPasswordByUsername(string $username): ?string
    {
        $username = strtolower($username);
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
        return null;
    }

    /**
     * Get user id by username.
     *
     * @param string $username
     * @return string
     * @throws DomainException
     */
    public function getIdByUsername(string $username): string
    {
        $username = strtolower($username);
        $where = ['username' => $username];
        if (is_email($username)) {
            $where = ['email' => $username];
        }
        $query = $this->userTable->newSelect();
        $query->select(['id'])->where($where);
        $row = $query->execute()->fetch('assoc');
        if (!empty($row)) {
            return $row['id'];
        }
        throw new DomainException(__('Username not found'));
    }

    /**
     * Create a user
     *
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @return bool
     */
    public function createUser(string $username, string $password, string $email, string $firstName, string $lastName)
    {
        $row = [
            'role_id' => 2, // User
            'username' => strtolower($username),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => strtolower($email),
            'first_name' => $firstName,
            'last_name' => $lastName,
            'created_by' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        return $this->userTable->insert($row)->lastInsertId();
    }
}
