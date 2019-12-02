<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%activities}}`.
 */
class m191202_053054_create_activities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activities', [
            'id' => $this->primaryKey(),
            'title' => $this -> string()->notNull(),
            'dayStart' => $this ->string() ,
            'dayEnd' => $this -> string(),
            'userID' => $this -> integer(),
            'description' => $this -> text(),
            'cycle' => $this -> boolean(),
            'isBlocked' => $this -> boolean(),
            // 'attachments' => '' реляционная связь
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activities');
    }
}
