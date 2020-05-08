<?php

class m200508_123134_create_logs_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('log', array(
            'id' => 'pk',
            'ip' => 'string NOT NULL',
            'date' => 'DATETIME NOT NULL',
            'method' => 'string NOT NULL',
            'code' => 'integer NOT NULL',
        ));
	}

	public function down()
	{
        $this->dropTable('log');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}