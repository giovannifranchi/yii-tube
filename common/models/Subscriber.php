<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%subscriber}}".
 *
 * @property int $id
 * @property int $channel_id
 * @property int $subscriber_id
 * @property int|null $created_at
 *
 * @property User $channel
 * @property User $subscriber
 */
class Subscriber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%subscriber}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['channel_id', 'subscriber_id'], 'required'],
            [['channel_id', 'subscriber_id', 'created_at'], 'integer'],
            [['channel_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['channel_id' => 'id']],
            [['subscriber_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['subscriber_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'channel_id' => 'Channel ID',
            'subscriber_id' => 'Subscriber ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Channel]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getChannel()
    {
        return $this->hasOne(User::class, ['id' => 'channel_id']);
    }

    /**
     * Gets query for [[Subscriber]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getSubscriber()
    {
        return $this->hasOne(User::class, ['id' => 'subscriber_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SubscriberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SubscriberQuery(get_called_class());
    }
}
