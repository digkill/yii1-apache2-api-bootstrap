<?php

class m200508_115229_create_users_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('user', array(
            'id' => 'pk',
            'email' => 'string NOT NULL',
            'password' => 'string NOT NULL',
            'role' => 'string NOT NULL',
            'username' => 'string NOT NULL',
        ));
    }

    public function down()
    {
        $this->dropTable('user');
    }
}