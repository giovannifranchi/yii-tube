<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subscriber}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m230811_000308_create_subscriber_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subscriber}}', [
            'id' => $this->primaryKey(),
            'channel_id' => $this->integer(11)->notNull(),
            'subscriber_id' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(11),
        ]);

        // creates index for column `channel_id`
        $this->createIndex(
            '{{%idx-subscriber-channel_id}}',
            '{{%subscriber}}',
            'channel_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-subscriber-channel_id}}',
            '{{%subscriber}}',
            'channel_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `subscriber_id`
        $this->createIndex(
            '{{%idx-subscriber-subscriber_id}}',
            '{{%subscriber}}',
            'subscriber_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-subscriber-subscriber_id}}',
            '{{%subscriber}}',
            'subscriber_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-subscriber-channel_id}}',
            '{{%subscriber}}'
        );

        // drops index for column `channel_id`
        $this->dropIndex(
            '{{%idx-subscriber-channel_id}}',
            '{{%subscriber}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-subscriber-subscriber_id}}',
            '{{%subscriber}}'
        );

        // drops index for column `subscriber_id`
        $this->dropIndex(
            '{{%idx-subscriber-subscriber_id}}',
            '{{%subscriber}}'
        );

        $this->dropTable('{{%subscriber}}');
    }
}
