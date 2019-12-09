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
            'id' => $this->primaryKey()->comment('Порядковый номер'),
            'title' => $this -> string()->notNull()->comment('Название события'),
            'dayStart' => $this ->string()->comment('Дата начала'),
            'dayEnd' => $this -> string()->comment('Дата окончания'),
            'userID' => $this -> integer()->comment('Создатель события'),
            'description' => $this -> text()->comment('Описание события'),
            'cycle' => $this -> boolean()->comment('Может ли повторяться'),
            'isBlocked' => $this -> boolean()->comment('Блокирует ли даты'),
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
        $this->dropForeignKey('fk-activity-userID', 'activities');
        $this->dropTable('activities');
    }
}
