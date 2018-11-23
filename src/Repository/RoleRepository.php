<?php

namespace App\Repository;

use App\Table\RoleTable;
use Slim\Container;

/**
 * RoleRepository
 */
class RoleRepository extends AppRepository
{
    /**
     * @var RoleTable
     */
    private $roleTable;

    /**
     * RoleRepository constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->roleTable = $container->get(RoleTable::class);
    }

    /**
     * Get all roles
     *
     * @return array
     */
    public function getRoles(): array
    {
        $query = $this->roleTable->newSelect(false);
        $query->select(['name', 'position']);
        $rows = $query->execute()->fetchAll('assoc');
        return $rows?: null;
    }
}
