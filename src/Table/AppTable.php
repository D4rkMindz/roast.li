<?php

namespace App\Table;

use Cake\Database\Connection;
use Cake\Database\Expression\QueryExpression;
use Cake\Database\Query;
use Cake\Database\StatementInterface;

/**
 * Class AbstractTable.
 */
abstract class AppTable implements TableInterface
{
    protected $table = null;

    protected $connection = null;

    /**
     * AppTable constructor.
     *
     * @todo rename model to table
     *
     * @param Connection $connection
     */
    public function __construct(Connection $connection = null)
    {
        $this->connection = $connection;
    }

    /**
     * Check if value exists in database
     *
     * @param string $field
     * @param string $value
     * @return bool
     */
    public function exist(string $field, string $value): bool
    {
        $query = $this->newSelect();
        $query->select(1)->where([$field => $value]);
        $row = $query->execute()->fetch();
        return !empty($row);
    }

    /**
     * Get Query.
     *
     * @param bool $forTableWithMetaInformation Needs to be false on a table without meta information
     * @return Query
     */
    public function newSelect($forTableWithMetaInformation = true): Query
    {
        $query = $this->connection->newQuery()->from($this->table);
        if ($forTableWithMetaInformation) {
            $query->where(['OR' => [['archived_at IS' => null], ['archived_at >=' => date('Y-m-d H:i:s')]]]);
        }
        return $query;
    }

    /**
     * Get all entries from database.
     *
     * @return array $rows
     */
    public function getAll(): array
    {
        $query = $this->newSelect();
        $query->select('*');
        $rows = $query->execute()->fetchAll('assoc');

        return $rows;
    }

    /**
     * Insert into database.
     *
     * @param array $row with data to insertUser into database
     *
     * @return StatementInterface
     */
    public function insert(array $row): StatementInterface
    {
        return $this->connection->insert($this->table, $row);
    }

    /**
     * Update database.
     *
     * @param array $row
     *
     * @param array $where should be the id
     * @param bool|null $forTableWithMetaInformation
     * @param null|string $executorId
     * @return bool
     */
    public function update(array $row, ?array $where = ['id' => '1'], ?bool $forTableWithMetaInformation = true, ?string $executorId = null): bool
    {
        $query = $this->connection->newQuery();
        $query->update($this->table)
            ->set($row)
            ->where($where);
        if ($forTableWithMetaInformation && !empty($executorId)) {
            $query->set(['modified_by' => $executorId, 'modified_at' => date('Y-m-d')]);
        }

        return (bool)$query->execute();
    }

    /**
     * Archive record.
     *
     * Only use this Method on tables with the meta information.
     *
     * @param string $id
     * @param string $userId
     * @return StatementInterface
     */
    public function archive(string $id, string $userId): StatementInterface
    {
        $row = [
            'archived_by' => $userId,
            'archived_at' => date('Y-m-d H:i:s'),
        ];
        $query = $this->connection->newQuery();
        $query->update($this->table)
            ->set($row)
            ->where(['id' => $id]);
        return $query->execute();
    }

    /**
     * Delete from database.
     *
     * @param string $id
     *
     * @return StatementInterface
     */
    public function delete(string $id): StatementInterface
    {
        return $this->connection->delete($this->table, ['id' => $id]);
    }
}
