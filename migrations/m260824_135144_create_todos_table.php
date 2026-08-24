<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%todos}}`.
 */
class m260824_135144_create_todos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('todos', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'completed' => $this->boolean()->notNull()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('todos');
    }
}
