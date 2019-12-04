<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%days}}`.
 */
class m191202_084700_create_days_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('days', [
            'isWorkingDay' => $this-> boolean(),
            'activities' => $this -> string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('days');
    }
}
