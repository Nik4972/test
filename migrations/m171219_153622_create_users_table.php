<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m171219_153622_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
 
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'balance' => $this->decimal(15,2)->notNull()->defaultValue(0),
            'created_at' => $this->timestamp()->notNull(),            
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
