<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "{{%video}}".
 *
 * @property string $video_id
 * @property string $title
 * @property string|null $video_name
 * @property string|null $tags
 * @property string|null $thumbnail
 * @property int|null $status
 * @property int|null $hasThumbnail
 * @property string|null $description
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $createdBy
 */
class Video extends \yii\db\ActiveRecord
{

    /**
     * @var \yii\web\UploadedFile
     */
    public $video;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id', 'title'], 'required'],
            [['status', 'hasThumbnail', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['video_id'], 'string', 'max' => 8],
            [['title', 'video_name', 'tags', 'thumbnail'], 'string', 'max' => 255],
            [['video_id'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'video_id' => 'Video ID',
            'title' => 'Title',
            'video_name' => 'Video Name',
            'tags' => 'Tags',
            'thumbnail' => 'Thumbnail',
            'status' => 'Status',
            'hasThumbnail' => 'Has Thumbnail',
            'description' => 'Description',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\VideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\VideoQuery(get_called_class());
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $isInsert = $this->isNewRecord;

        if ($isInsert) {
            $this->video_id = Yii::$app->security->generateRandomString(8);
            $this->title = $this->video->name;
            $this->video_name = $this->video->name;
        }

        if($this->hasThumbnail){
            $this->hasThumbnail = 1;
        }


        return parent::save($runValidation, $attributeNames);
    }
}
