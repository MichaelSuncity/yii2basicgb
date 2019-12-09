<?php

use yii\db\Migration;

/**
 * Class m191209_104206_update_activities_table
 */
class m191209_104206_update_activities_table extends Migration
{
    public function up()
    {
        $this->addColumn('activities', 'created_at', $this->integer());
        $this->addColumn('activities', 'updated_at', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('activities', 'created_at', $this->integer());
        $this->dropColumn('activities', 'updated_at', $this->integer());
    }
}
