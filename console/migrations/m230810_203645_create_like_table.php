<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%like}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%video}}`
 */
class m230810_203645_create_like_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%like}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'video_id' => $this->string()->notNull(),
            'type' => $this->boolean()->notNull(),
            'created_at' => $this->integer(11),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-like-user_id}}',
            '{{%like}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-like-user_id}}',
            '{{%like}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `video_id`
        $this->createIndex(
            '{{%idx-like-video_id}}',
            '{{%like}}',
            'video_id'
        );

        // add foreign key for table `{{%video}}`
        $this->addForeignKey(
            '{{%fk-like-video_id}}',
            '{{%like}}',
            'video_id',
            '{{%video}}',
            'video_id',
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
            '{{%fk-like-user_id}}',
            '{{%like}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-like-user_id}}',
            '{{%like}}'
        );

        // drops foreign key for table `{{%video}}`
        $this->dropForeignKey(
            '{{%fk-like-video_id}}',
            '{{%like}}'
        );

        // drops index for column `video_id`
        $this->dropIndex(
            '{{%idx-like-video_id}}',
            '{{%like}}'
        );

        $this->dropTable('{{%like}}');
    }
}
