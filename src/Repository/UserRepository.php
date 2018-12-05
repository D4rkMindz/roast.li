<?php

namespace App\Repository;

use App\Table\LikedPostTable;
use App\Table\RoleTable;
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
     * @var LikedPostTable
     */
    private $likedPostTable;

    /**
     * @var RoleTable
     */
    private $roleTable;

    /**
     * UserRepository constructor.
     *
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    {
        $this->userTable = $container->get(UserTable::class);
        $this->likedPostTable = $container->get(LikedPostTable::class);
        $this->roleTable = $container->get(RoleTable::class);

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
     * Get a single user.
     *
     * @param string $userId
     * @return null
     */
    public function getUser(string $userId)
    {
        $query = $this->userTable->newSelect();
        $query
            ->select([
                'user.id',
                'user.username',
                'user.email',
                'user.first_name',
                'user.last_name',
                'user.thumbnail_url',
                'user.created_at',
                'user.created_by',
                'user.modified_at',
                'user.modified_by',
                'user.archived_by',
                'user.archived_at',
                'role_name' => 'role.name',
                'role_position' => 'role.position',
            ])
            ->leftJoin('role', ['role.id = user.role_id'])
            ->where(['user.id' => $userId]);
        $user = $query->execute()->fetch('assoc');

        if (!empty($user)) {
            $user['role'] = [
                'name' => $user['role_name'],
                'position' => $user['role_position'],
            ];
            unset($user['role_name'], $user['role_position']);

            return $user;
        }

        return null;
    }

    /**
     * Get all users.
     *
     * @return array
     */
    public function getAllUsers()
    {
        $query = $this->userTable->newSelect();
        $query
            ->select([
                'user.username',
                'user.email',
                'user.first_name',
                'user.last_name',
                'user.thumbnail_url',
                'user.created_at',
                'user.created_by',
                'user.modified_at',
                'user.modified_by',
                'user.archived_by',
                'user.archived_at',
                'role_name' => 'role.name',
                'role_position' => 'role.position',
            ])
            ->leftJoin('role', ['role.id = user.role_id']);
        $users = $query->execute()->fetchAll('assoc');

        if (!empty($users)) {
            foreach ($users as $key => $user) {
                $users[$key]['role'] = [
                    'name' => $user['role_name'],
                    'position' => $user['role_position'],
                ];
                unset($users[$key]['role_name'], $users[$key]['role_position']);
            }

            return $users;
        }

        return null;
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
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'created_by' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        return $this->userTable->insert($row)->lastInsertId();
    }

    /**
     * @param string $executorId
     * @param string $userId
     * @param null|string $username
     * @param null|string $password
     * @param null|string $email
     * @param null|string $firstName
     * @param null|string $lastName
     * @return bool
     */
    public function updateUser(
        string $executorId,
        string $userId,
        ?string $username,
        ?string $password,
        ?string $email,
        ?string $firstName,
        ?string $lastName
    )
    {
        $row = [];
        if (!empty($username)) {
            $row['username'] = $username;
        }

        if (!empty($password)) {
            $row['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if (!empty($email)) {
            $row['email'] = $email;
        }

        if (!empty($firstName)) {
            $row['first_name'] = $firstName;
        }

        if (!empty($lastName)) {
            $row['last_name'] = $lastName;
        }

        return (bool)$this->userTable->update($row, ['id' => $userId], true, $executorId);
    }

    /**
     * Update the role of a user.
     *
     * @param $userId
     * @param $rolePosition
     * @return bool
     */
    public function updateRole($userId, $rolePosition)
    {
        $query = $this->roleTable->newSelect(false);
        $query->select('id')->where(['position' => $rolePosition]);
        $row = $query->execute()->fetch('assoc');
        $roleId = array_value('id', $row);
        // Just to be sure, but this is validated before
        if (empty($row)) {
            $roleId = 8; // ROLE_ANONYMOUS
        }

        return (bool)$this->userTable->update(['role_id' => $roleId], ['id' => $userId]);
    }

    /**
     * Archive
     *
     * @param string $userId
     * @param string $executorId
     * @param bool $hardDelete
     * @return bool
     */
    public function archiveUser(string $userId, string $executorId, bool $hardDelete = true)
    {
        $query = $this->likedPostTable->newSelect(false);
        $query->select(['id'])->where(['user_id' => $userId]);
        $rows = $query->execute()->fetchAll('assoc');
        foreach ($rows as $row) {
            $this->likedPostTable->delete($row['id']);
        }

        if ($hardDelete) {
            return (bool)$this->userTable->delete($userId);
        }
        return (bool)$this->userTable->archive($userId, $executorId);
    }

    /**
     * Get user role
     *
     * @param string $userId
     * @return null
     */
    public function getUserPermissionLevel(string $userId)
    {
        $query = $this->userTable->newSelect();
        $query->select(['role.level'])
            ->leftJoin('role', ['role.id = user.role_id'])
            ->where(['user.id' => $userId]);
        $row = $query->execute()->fetch('assoc');

        return $row ? $row['level'] : null;
    }

    /**
     * Check a users password.
     *
     * @param string $userId
     * @param string $password
     * @return bool
     */
    public function checkPassword(string $userId, string $password): bool
    {
        $query = $this->userTable->newSelect();
        $query->select('password')->where(['id' => $userId]);
        $row = $query->execute()->fetch('assoc');
        if (!empty($row)) {
            return password_verify($password, $row['password']);
        }
        return false;
    }
}
