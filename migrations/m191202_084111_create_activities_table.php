<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%activities}}`.
 */
class m191202_084111_create_activities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activities', [
            'id' => $this->primaryKey(),
            'title' => $this -> string()->notNull(),
            'dayStart' => $this ->string(),
            'dayEnd' => $this -> string(),
            'userID' => $this -> integer(),
            'description' => $this -> text(),
            'cycle' => $this -> boolean(),
            'isBlocked' => $this -> boolean(),
        ]);

        $this->addForeignKey(
            'fk-activity-userID',
            'activities',
            'userID',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activities');
    }
}
