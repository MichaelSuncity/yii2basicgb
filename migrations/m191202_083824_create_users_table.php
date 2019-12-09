<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m191202_083824_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey()->comment('Номер пользователя'),
            'username' => $this->string()->notNull()->comment('Логин'),
            'password_hash' => $this->string()->notNull()->comment('Хеш пароля'),
            'auth_key' => $this->string()->notNull()->comment('Ключ аутентификации'),
            'access_token' => $this->string()->notNull()->comment('Ключ мгновенного доступа'),
            'created_at' => $this->integer()->comment('Дата создания записи'),
            'updated_at' => $this->integer()->comment('Дата последнего редактирования'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
