<?php

use yii\db\Migration;

/**
 * Handles the creation of table `history`.
 */
class m171219_145519_create_history_table extends Migration
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
        
        $this->createTable('history', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'username_b' => $this->string()->notNull(),
            'action' => $this->string()->notNull(),
            'summa' => $this->decimal(15,2)->notNull(),
            'created_at' => $this->timestamp()->notNull(),


        ], $tableOptions );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('history');
    }
}
