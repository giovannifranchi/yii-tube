<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;


/**
 * This is the model class for table "{{%video}}".
 *
 * @property string $video_id
 * @property string $title
 * @property string|null $video_name
 * @property string|null $tags
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

    const STATUS_UNLISTED = 0;
    const STATUS_PUBLISHED = 1;
 
    /**
     * @var \yii\web\UploadedFile
     */
    public $video;

    /**
     * @var \yii\web\UploadedFile
     */
    public $thumbnail;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class'=> BlameableBehavior::class,
                'updatedByAttribute'=>false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id', 'title'], 'required'],
            [['status', 'hasThumbnail', 'created_by', 'created_at', 'updated_at'], 'integer'],
            ['status', 'default', 'value' => self::STATUS_UNLISTED],
            ['hasThumbnail', 'default', 'value'=> 0],
            [['description'], 'string'],
            [['video_id'], 'string', 'max' => 8],
            [['title', 'video_name', 'tags'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'hasThumbnail' => 'Has Thumbnail',
            'description' => 'Description',
            'thumbnail' => 'Thumbnail',
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

        if($this->thumbnail){
            $this->hasThumbnail = 1;
        }

        $saved = parent::save($runValidation, $attributeNames);

        if(!$saved) return false;

        if($isInsert){
            $videoPath = Yii::getAlias("@frontend/web/storage/videos/" . $this->video_id . '.mp4');
            if(!is_dir(dirname($videoPath))){
                FileHelper::createDirectory(dirname($videoPath));
            }
            $this->video->saveAs($videoPath);
        }

        if($this->thumbnail){
            $thumbnailPath = Yii::getAlias("@frontend/web/storage/thumbs/". $this->video_id . 'jpg');
            if(!is_dir(dirname($thumbnailPath))){
                FileHelper::createDirectory(dirname($thumbnailPath));
            }
            $this->thumbnail->saveAs($thumbnailPath);
        }

        return true;
    }

    public function getVideoLink()
    {
        return Yii::$app->params['frontendURL'] . "storage/videos/" . $this->video_id . ".mp4";
    }

    public function getThumbLink()
    {
        return $this->hasThumbnail ? Yii::$app->params['frontendURL'] . "storage/thumbs" . $this->video_id . "jpg" : "" ;
    }

    public function getStatusLabels()
    {
        return [
            self::STATUS_UNLISTED => 'Unlisted',
            self::STATUS_PUBLISHED => 'Published'
        ];
    }
}
