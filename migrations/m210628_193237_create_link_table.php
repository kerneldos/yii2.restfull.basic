<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%link}}`.
 */
class m210628_193237_create_link_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%link}}', [
            'id'            => $this->primaryKey(),
            'url'           => $this->string()->notNull(),
            'description'   => $this->string(255),
            'hash'          => $this->string()->notNull()->unique(),
            'counter'       => $this->integer()->notNull()->defaultValue(0),
            'created_at'    => $this->dateTime()->notNull(),
            'created_by'    => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%link}}');
    }
}
