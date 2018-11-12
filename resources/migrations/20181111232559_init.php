<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Init extends AbstractMigration
{
    public function change()
    {
        $this->execute("ALTER DATABASE CHARACTER SET 'utf8';");
        $this->execute("ALTER DATABASE COLLATE='utf8_general_ci';");
        $table = $this->table("role", ['id' => false, 'primary_key' => ["id"], 'engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => "", 'row_format' => "Dynamic"]);
        $table->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable']);
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 80, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id']);
        $table->addColumn('position', 'string', ['null' => false, 'limit' => 80, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name']);
        $table->save();
        $table = $this->table("user", ['id' => false, 'primary_key' => ["id"], 'engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => "", 'row_format' => "Dynamic"]);
        $table->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable']);
        $table->addColumn('role_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'id']);
        $table->addColumn('username', 'string', ['null' => false, 'limit' => 80, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'role_id']);
        $table->addColumn('email', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'username']);
        $table->addColumn('first_name', 'string', ['null' => false, 'limit' => 80, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'email']);
        $table->addColumn('last_name', 'string', ['null' => false, 'limit' => 80, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'first_name']);
        $table->addColumn('password', 'string', ['null' => false, 'limit' => 80, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'last_name']);
        $table->addColumn('thumbnail_url', 'string', ['null' => true, 'default' => "NULL", 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'password']);
        $table->addColumn('created_at', 'datetime', ['null' => false, 'after' => 'thumbnail_url']);
        $table->addColumn('created_by', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at']);
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'default' => "NULL", 'after' => 'created_by']);
        $table->addColumn('modified_by', 'integer', ['null' => true, 'default' => "NULL", 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at']);
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'default' => "NULL", 'after' => 'modified_by']);
        $table->addColumn('archived_by', 'integer', ['null' => true, 'default' => "NULL", 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at']);
        $table->save();
        $table = $this->table("user");
        $table->removeIndexByName("fk_user_role1");
        $table = $this->table("user");
        $table->addIndex(['role_id'], ['name' => "fk_user_role1", 'unique' => false])->save();
        $table = $this->table("liked_post", ['id' => false, 'primary_key' => ["id"], 'engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => "", 'row_format' => "Dynamic"]);
        $table->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable']);
        $table->addColumn('user_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'id']);
        $table->addColumn('post_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'user_id']);
        $table->addColumn('liked_at', 'datetime', ['null' => false, 'after' => 'post_id']);
        $table->save();
        $table = $this->table("liked_post");
        $table->removeIndexByName("fk_liked_post_post1");
        $table = $this->table("liked_post");
        $table->addIndex(['post_id'], ['name' => "fk_liked_post_post1", 'unique' => false])->save();
        $table = $this->table("liked_post");
        $table->removeIndexByName("fk_liked_post_user");
        $table = $this->table("liked_post");
        $table->addIndex(['user_id'], ['name' => "fk_liked_post_user", 'unique' => false])->save();
        $table = $this->table("post", ['id' => false, 'primary_key' => ["id"], 'engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => "", 'row_format' => "Dynamic"]);
        $table->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable']);
        $table->addColumn('content', 'string', ['null' => false, 'limit' => 1000, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id']);
        $table->addColumn('created_at', 'datetime', ['null' => false, 'after' => 'content']);
        $table->addColumn('created_by', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at']);
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'default' => "NULL", 'after' => 'created_by']);
        $table->addColumn('modified_by', 'integer', ['null' => true, 'default' => "NULL", 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at']);
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'default' => "NULL", 'after' => 'modified_by']);
        $table->addColumn('archived_by', 'integer', ['null' => true, 'default' => "NULL", 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at']);
        $table->save();
    }
}
