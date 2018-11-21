<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class AddedRoleLevel extends AbstractMigration
{
    public function change()
    {
        $table = $this->table("role");
        $table->addColumn('level', 'integer', ['null' => false, 'default' => "0", 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'position']);
        $table->save();
    }
}
