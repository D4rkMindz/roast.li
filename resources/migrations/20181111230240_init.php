<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Init extends AbstractMigration
{
    public function change()
    {
        $this->execute("ALTER DATABASE CHARACTER SET 'utf8';");
        $this->execute("ALTER DATABASE COLLATE='utf8_general_ci';");
        $table = $this->table("role", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('role')->hasColumn('id')) {
            $this->table("role")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("role")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 80, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('position', 'string', ['null' => false, 'limit' => 80, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name'])->update();
        $table->save();
        $table = $this->table("user", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('user')->hasColumn('id')) {
            $this->table("user")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("user")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('role_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'id'])->update();
        $table->addColumn('username', 'string', ['null' => false, 'limit' => 80, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'role_id'])->update();
        $table->addColumn('email', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'username'])->update();
        $table->addColumn('first_name', 'string', ['null' => false, 'limit' => 80, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'email'])->update();
        $table->addColumn('last_name', 'string', ['null' => false, 'limit' => 80, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'first_name'])->update();
        $table->addColumn('password', 'string', ['null' => false, 'limit' => 80, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'last_name'])->update();
        $table->addColumn('thumbnail_url', 'string', ['null' => true, 'default' => 'NULL', 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'password'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => false, 'after' => 'thumbnail_url'])->update();
        $table->addColumn('created_by', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'default' => 'NULL', 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'default' => 'NULL', 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'default' => 'NULL', 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'default' => 'NULL', 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('user')->hasIndex('fk_user_role1')) {
            $this->table("user")->removeIndexByName('fk_user_role1');
        }
        $this->table("user")->addIndex(['role_id'], ['name' => "fk_user_role1", 'unique' => false])->save();
        $table = $this->table("liked_post", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('liked_post')->hasColumn('id')) {
            $this->table("liked_post")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("liked_post")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('user_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'id'])->update();
        $table->addColumn('post_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'user_id'])->update();
        $table->addColumn('liked_at', 'datetime', ['null' => false, 'after' => 'post_id'])->update();
        $table->save();
        if($this->table('liked_post')->hasIndex('fk_liked_post_post1')) {
            $this->table("liked_post")->removeIndexByName('fk_liked_post_post1');
        }
        $this->table("liked_post")->addIndex(['post_id'], ['name' => "fk_liked_post_post1", 'unique' => false])->save();
        if($this->table('liked_post')->hasIndex('fk_liked_post_user')) {
            $this->table("liked_post")->removeIndexByName('fk_liked_post_user');
        }
        $this->table("liked_post")->addIndex(['user_id'], ['name' => "fk_liked_post_user", 'unique' => false])->save();
        $table = $this->table("post", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('post')->hasColumn('id')) {
            $this->table("post")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("post")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('content', 'string', ['null' => false, 'limit' => 1000, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => false, 'after' => 'content'])->update();
        $table->addColumn('created_by', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'default' => 'NULL', 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'default' => 'NULL', 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'default' => 'NULL', 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'default' => 'NULL', 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
    }
}
