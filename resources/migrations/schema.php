<?php

return array (
  'database' => 
  array (
    'default_character_set_name' => 'utf8',
    'default_collation_name' => 'utf8_general_ci',
  ),
  'tables' => 
  array (
    'phinxlog' => 
    array (
      'table' => 
      array (
        'table_name' => 'phinxlog',
        'engine' => 'InnoDB',
        'table_comment' => '',
        'table_collation' => 'utf8_general_ci',
        'character_set_name' => 'utf8',
        'row_format' => 'Dynamic',
      ),
      'columns' => 
      array (
        'version' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'phinxlog',
          'COLUMN_NAME' => 'version',
          'ORDINAL_POSITION' => '1',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'bigint',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '19',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'bigint(20)',
          'COLUMN_KEY' => 'PRI',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'migration_name' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'phinxlog',
          'COLUMN_NAME' => 'migration_name',
          'ORDINAL_POSITION' => '2',
          'COLUMN_DEFAULT' => 'NULL',
          'IS_NULLABLE' => 'YES',
          'DATA_TYPE' => 'varchar',
          'CHARACTER_MAXIMUM_LENGTH' => '100',
          'CHARACTER_OCTET_LENGTH' => '300',
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => 'utf8',
          'COLLATION_NAME' => 'utf8_general_ci',
          'COLUMN_TYPE' => 'varchar(100)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'start_time' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'phinxlog',
          'COLUMN_NAME' => 'start_time',
          'ORDINAL_POSITION' => '3',
          'COLUMN_DEFAULT' => 'NULL',
          'IS_NULLABLE' => 'YES',
          'DATA_TYPE' => 'timestamp',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => '0',
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'timestamp',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'end_time' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'phinxlog',
          'COLUMN_NAME' => 'end_time',
          'ORDINAL_POSITION' => '4',
          'COLUMN_DEFAULT' => 'NULL',
          'IS_NULLABLE' => 'YES',
          'DATA_TYPE' => 'timestamp',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => '0',
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'timestamp',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'breakpoint' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'phinxlog',
          'COLUMN_NAME' => 'breakpoint',
          'ORDINAL_POSITION' => '5',
          'COLUMN_DEFAULT' => '0',
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'tinyint',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '3',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'tinyint(1)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
      ),
      'indexes' => 
      array (
        'PRIMARY' => 
        array (
          1 => 
          array (
            'Table' => 'phinxlog',
            'Non_unique' => '0',
            'Key_name' => 'PRIMARY',
            'Seq_in_index' => '1',
            'Column_name' => 'version',
            'Collation' => 'A',
            'Sub_part' => NULL,
            'Packed' => NULL,
            'Null' => '',
            'Index_type' => 'BTREE',
            'Comment' => '',
            'Index_comment' => '',
          ),
        ),
      ),
      'foreign_keys' => NULL,
    ),
    'role' => 
    array (
      'table' => 
      array (
        'table_name' => 'role',
        'engine' => 'InnoDB',
        'table_comment' => '',
        'table_collation' => 'utf8_general_ci',
        'character_set_name' => 'utf8',
        'row_format' => 'Dynamic',
      ),
      'columns' => 
      array (
        'id' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'role',
          'COLUMN_NAME' => 'id',
          'ORDINAL_POSITION' => '1',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'int',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '10',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'int(11)',
          'COLUMN_KEY' => 'PRI',
          'EXTRA' => 'auto_increment',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'name' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'role',
          'COLUMN_NAME' => 'name',
          'ORDINAL_POSITION' => '2',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'varchar',
          'CHARACTER_MAXIMUM_LENGTH' => '80',
          'CHARACTER_OCTET_LENGTH' => '240',
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => 'utf8',
          'COLLATION_NAME' => 'utf8_general_ci',
          'COLUMN_TYPE' => 'varchar(80)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'position' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'role',
          'COLUMN_NAME' => 'position',
          'ORDINAL_POSITION' => '3',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'varchar',
          'CHARACTER_MAXIMUM_LENGTH' => '80',
          'CHARACTER_OCTET_LENGTH' => '240',
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => 'utf8',
          'COLLATION_NAME' => 'utf8_general_ci',
          'COLUMN_TYPE' => 'varchar(80)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
      ),
      'indexes' => 
      array (
        'PRIMARY' => 
        array (
          1 => 
          array (
            'Table' => 'role',
            'Non_unique' => '0',
            'Key_name' => 'PRIMARY',
            'Seq_in_index' => '1',
            'Column_name' => 'id',
            'Collation' => 'A',
            'Sub_part' => NULL,
            'Packed' => NULL,
            'Null' => '',
            'Index_type' => 'BTREE',
            'Comment' => '',
            'Index_comment' => '',
          ),
        ),
      ),
      'foreign_keys' => NULL,
    ),
    'user' => 
    array (
      'table' => 
      array (
        'table_name' => 'user',
        'engine' => 'InnoDB',
        'table_comment' => '',
        'table_collation' => 'utf8_general_ci',
        'character_set_name' => 'utf8',
        'row_format' => 'Dynamic',
      ),
      'columns' => 
      array (
        'id' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'id',
          'ORDINAL_POSITION' => '1',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'int',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '10',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'int(11)',
          'COLUMN_KEY' => 'PRI',
          'EXTRA' => 'auto_increment',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'role_id' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'role_id',
          'ORDINAL_POSITION' => '2',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'int',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '10',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'int(11)',
          'COLUMN_KEY' => 'MUL',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'username' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'username',
          'ORDINAL_POSITION' => '3',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'varchar',
          'CHARACTER_MAXIMUM_LENGTH' => '80',
          'CHARACTER_OCTET_LENGTH' => '240',
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => 'utf8',
          'COLLATION_NAME' => 'utf8_general_ci',
          'COLUMN_TYPE' => 'varchar(80)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'email' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'email',
          'ORDINAL_POSITION' => '4',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'varchar',
          'CHARACTER_MAXIMUM_LENGTH' => '255',
          'CHARACTER_OCTET_LENGTH' => '765',
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => 'utf8',
          'COLLATION_NAME' => 'utf8_general_ci',
          'COLUMN_TYPE' => 'varchar(255)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'first_name' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'first_name',
          'ORDINAL_POSITION' => '5',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'varchar',
          'CHARACTER_MAXIMUM_LENGTH' => '80',
          'CHARACTER_OCTET_LENGTH' => '240',
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => 'utf8',
          'COLLATION_NAME' => 'utf8_general_ci',
          'COLUMN_TYPE' => 'varchar(80)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'last_name' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'last_name',
          'ORDINAL_POSITION' => '6',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'varchar',
          'CHARACTER_MAXIMUM_LENGTH' => '80',
          'CHARACTER_OCTET_LENGTH' => '240',
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => 'utf8',
          'COLLATION_NAME' => 'utf8_general_ci',
          'COLUMN_TYPE' => 'varchar(80)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'password' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'password',
          'ORDINAL_POSITION' => '7',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'varchar',
          'CHARACTER_MAXIMUM_LENGTH' => '80',
          'CHARACTER_OCTET_LENGTH' => '240',
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => 'utf8',
          'COLLATION_NAME' => 'utf8_general_ci',
          'COLUMN_TYPE' => 'varchar(80)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'thumbnail_url' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'thumbnail_url',
          'ORDINAL_POSITION' => '8',
          'COLUMN_DEFAULT' => 'NULL',
          'IS_NULLABLE' => 'YES',
          'DATA_TYPE' => 'varchar',
          'CHARACTER_MAXIMUM_LENGTH' => '255',
          'CHARACTER_OCTET_LENGTH' => '765',
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => 'utf8',
          'COLLATION_NAME' => 'utf8_general_ci',
          'COLUMN_TYPE' => 'varchar(255)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'created_at' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'created_at',
          'ORDINAL_POSITION' => '9',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'datetime',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => '0',
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'datetime',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'created_by' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'created_by',
          'ORDINAL_POSITION' => '10',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'int',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '10',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'int(11)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'modified_at' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'modified_at',
          'ORDINAL_POSITION' => '11',
          'COLUMN_DEFAULT' => 'NULL',
          'IS_NULLABLE' => 'YES',
          'DATA_TYPE' => 'datetime',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => '0',
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'datetime',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'modified_by' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'modified_by',
          'ORDINAL_POSITION' => '12',
          'COLUMN_DEFAULT' => 'NULL',
          'IS_NULLABLE' => 'YES',
          'DATA_TYPE' => 'int',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '10',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'int(11)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'archived_at' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'archived_at',
          'ORDINAL_POSITION' => '13',
          'COLUMN_DEFAULT' => 'NULL',
          'IS_NULLABLE' => 'YES',
          'DATA_TYPE' => 'datetime',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => '0',
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'datetime',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'archived_by' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'archived_by',
          'ORDINAL_POSITION' => '14',
          'COLUMN_DEFAULT' => 'NULL',
          'IS_NULLABLE' => 'YES',
          'DATA_TYPE' => 'int',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '10',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'int(11)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
      ),
      'indexes' => 
      array (
        'PRIMARY' => 
        array (
          1 => 
          array (
            'Table' => 'user',
            'Non_unique' => '0',
            'Key_name' => 'PRIMARY',
            'Seq_in_index' => '1',
            'Column_name' => 'id',
            'Collation' => 'A',
            'Sub_part' => NULL,
            'Packed' => NULL,
            'Null' => '',
            'Index_type' => 'BTREE',
            'Comment' => '',
            'Index_comment' => '',
          ),
        ),
        'fk_user_role1' => 
        array (
          1 => 
          array (
            'Table' => 'user',
            'Non_unique' => '1',
            'Key_name' => 'fk_user_role1',
            'Seq_in_index' => '1',
            'Column_name' => 'role_id',
            'Collation' => 'A',
            'Sub_part' => NULL,
            'Packed' => NULL,
            'Null' => '',
            'Index_type' => 'BTREE',
            'Comment' => '',
            'Index_comment' => '',
          ),
        ),
      ),
      'foreign_keys' => 
      array (
        'fk_user_role1' => 
        array (
          'TABLE_NAME' => 'user',
          'COLUMN_NAME' => 'role_id',
          'CONSTRAINT_NAME' => 'fk_user_role1',
          'REFERENCED_TABLE_NAME' => 'role',
          'REFERENCED_COLUMN_NAME' => 'id',
          'UPDATE_RULE' => 'NO ACTION',
          'DELETE_RULE' => 'NO ACTION',
        ),
      ),
    ),
    'liked_post' => 
    array (
      'table' => 
      array (
        'table_name' => 'liked_post',
        'engine' => 'InnoDB',
        'table_comment' => '',
        'table_collation' => 'utf8_general_ci',
        'character_set_name' => 'utf8',
        'row_format' => 'Dynamic',
      ),
      'columns' => 
      array (
        'id' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'liked_post',
          'COLUMN_NAME' => 'id',
          'ORDINAL_POSITION' => '1',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'int',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '10',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'int(11)',
          'COLUMN_KEY' => 'PRI',
          'EXTRA' => 'auto_increment',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'user_id' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'liked_post',
          'COLUMN_NAME' => 'user_id',
          'ORDINAL_POSITION' => '2',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'int',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '10',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'int(11)',
          'COLUMN_KEY' => 'MUL',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'post_id' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'liked_post',
          'COLUMN_NAME' => 'post_id',
          'ORDINAL_POSITION' => '3',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'int',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '10',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'int(11)',
          'COLUMN_KEY' => 'MUL',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'liked_at' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'liked_post',
          'COLUMN_NAME' => 'liked_at',
          'ORDINAL_POSITION' => '4',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'datetime',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => '0',
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'datetime',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
      ),
      'indexes' => 
      array (
        'PRIMARY' => 
        array (
          1 => 
          array (
            'Table' => 'liked_post',
            'Non_unique' => '0',
            'Key_name' => 'PRIMARY',
            'Seq_in_index' => '1',
            'Column_name' => 'id',
            'Collation' => 'A',
            'Sub_part' => NULL,
            'Packed' => NULL,
            'Null' => '',
            'Index_type' => 'BTREE',
            'Comment' => '',
            'Index_comment' => '',
          ),
        ),
        'fk_liked_post_post1' => 
        array (
          1 => 
          array (
            'Table' => 'liked_post',
            'Non_unique' => '1',
            'Key_name' => 'fk_liked_post_post1',
            'Seq_in_index' => '1',
            'Column_name' => 'post_id',
            'Collation' => 'A',
            'Sub_part' => NULL,
            'Packed' => NULL,
            'Null' => '',
            'Index_type' => 'BTREE',
            'Comment' => '',
            'Index_comment' => '',
          ),
        ),
        'fk_liked_post_user' => 
        array (
          1 => 
          array (
            'Table' => 'liked_post',
            'Non_unique' => '1',
            'Key_name' => 'fk_liked_post_user',
            'Seq_in_index' => '1',
            'Column_name' => 'user_id',
            'Collation' => 'A',
            'Sub_part' => NULL,
            'Packed' => NULL,
            'Null' => '',
            'Index_type' => 'BTREE',
            'Comment' => '',
            'Index_comment' => '',
          ),
        ),
      ),
      'foreign_keys' => 
      array (
        'fk_liked_post_post1' => 
        array (
          'TABLE_NAME' => 'liked_post',
          'COLUMN_NAME' => 'post_id',
          'CONSTRAINT_NAME' => 'fk_liked_post_post1',
          'REFERENCED_TABLE_NAME' => 'post',
          'REFERENCED_COLUMN_NAME' => 'id',
          'UPDATE_RULE' => 'NO ACTION',
          'DELETE_RULE' => 'NO ACTION',
        ),
        'fk_liked_post_user' => 
        array (
          'TABLE_NAME' => 'liked_post',
          'COLUMN_NAME' => 'user_id',
          'CONSTRAINT_NAME' => 'fk_liked_post_user',
          'REFERENCED_TABLE_NAME' => 'user',
          'REFERENCED_COLUMN_NAME' => 'id',
          'UPDATE_RULE' => 'NO ACTION',
          'DELETE_RULE' => 'NO ACTION',
        ),
      ),
    ),
    'post' => 
    array (
      'table' => 
      array (
        'table_name' => 'post',
        'engine' => 'InnoDB',
        'table_comment' => '',
        'table_collation' => 'utf8_general_ci',
        'character_set_name' => 'utf8',
        'row_format' => 'Dynamic',
      ),
      'columns' => 
      array (
        'id' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'post',
          'COLUMN_NAME' => 'id',
          'ORDINAL_POSITION' => '1',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'int',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '10',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'int(11)',
          'COLUMN_KEY' => 'PRI',
          'EXTRA' => 'auto_increment',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'content' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'post',
          'COLUMN_NAME' => 'content',
          'ORDINAL_POSITION' => '2',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'varchar',
          'CHARACTER_MAXIMUM_LENGTH' => '1000',
          'CHARACTER_OCTET_LENGTH' => '3000',
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => 'utf8',
          'COLLATION_NAME' => 'utf8_general_ci',
          'COLUMN_TYPE' => 'varchar(1000)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'created_at' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'post',
          'COLUMN_NAME' => 'created_at',
          'ORDINAL_POSITION' => '3',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'datetime',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => '0',
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'datetime',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'created_by' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'post',
          'COLUMN_NAME' => 'created_by',
          'ORDINAL_POSITION' => '4',
          'COLUMN_DEFAULT' => NULL,
          'IS_NULLABLE' => 'NO',
          'DATA_TYPE' => 'int',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '10',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'int(11)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'modified_at' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'post',
          'COLUMN_NAME' => 'modified_at',
          'ORDINAL_POSITION' => '5',
          'COLUMN_DEFAULT' => 'NULL',
          'IS_NULLABLE' => 'YES',
          'DATA_TYPE' => 'datetime',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => '0',
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'datetime',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'modified_by' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'post',
          'COLUMN_NAME' => 'modified_by',
          'ORDINAL_POSITION' => '6',
          'COLUMN_DEFAULT' => 'NULL',
          'IS_NULLABLE' => 'YES',
          'DATA_TYPE' => 'int',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '10',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'int(11)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'archived_at' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'post',
          'COLUMN_NAME' => 'archived_at',
          'ORDINAL_POSITION' => '7',
          'COLUMN_DEFAULT' => 'NULL',
          'IS_NULLABLE' => 'YES',
          'DATA_TYPE' => 'datetime',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => NULL,
          'NUMERIC_SCALE' => NULL,
          'DATETIME_PRECISION' => '0',
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'datetime',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
        'archived_by' => 
        array (
          'TABLE_CATALOG' => 'def',
          'TABLE_SCHEMA' => 'modul-151_projekt',
          'TABLE_NAME' => 'post',
          'COLUMN_NAME' => 'archived_by',
          'ORDINAL_POSITION' => '8',
          'COLUMN_DEFAULT' => 'NULL',
          'IS_NULLABLE' => 'YES',
          'DATA_TYPE' => 'int',
          'CHARACTER_MAXIMUM_LENGTH' => NULL,
          'CHARACTER_OCTET_LENGTH' => NULL,
          'NUMERIC_PRECISION' => '10',
          'NUMERIC_SCALE' => '0',
          'DATETIME_PRECISION' => NULL,
          'CHARACTER_SET_NAME' => NULL,
          'COLLATION_NAME' => NULL,
          'COLUMN_TYPE' => 'int(11)',
          'COLUMN_KEY' => '',
          'EXTRA' => '',
          'PRIVILEGES' => 'select,insert,update,references',
          'COLUMN_COMMENT' => '',
          'IS_GENERATED' => 'NEVER',
          'GENERATION_EXPRESSION' => NULL,
        ),
      ),
      'indexes' => 
      array (
        'PRIMARY' => 
        array (
          1 => 
          array (
            'Table' => 'post',
            'Non_unique' => '0',
            'Key_name' => 'PRIMARY',
            'Seq_in_index' => '1',
            'Column_name' => 'id',
            'Collation' => 'A',
            'Sub_part' => NULL,
            'Packed' => NULL,
            'Null' => '',
            'Index_type' => 'BTREE',
            'Comment' => '',
            'Index_comment' => '',
          ),
        ),
      ),
      'foreign_keys' => NULL,
    ),
  ),
);