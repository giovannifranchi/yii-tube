<?php

namespace common\models\query;

use common\models\Video;
use common\models\VideoView;
use yii\web\NotFoundHttpException;

/**
 * This is the ActiveQuery class for [[\common\models\Video]].
 *
 * @see \common\models\Video
 */
class VideoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Video[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Video|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function creator($user_id){
        return $this->andWhere(['created_by' => $user_id]);
    }

    public function published(){
        return $this->andWhere(['status' => Video::STATUS_PUBLISHED]);
    }

    public function latest(){
        return $this->orderBy(['created_at' => SORT_DESC]);
    }


    public function byKeyword($keyword)
    {
        return $this->andWhere(['or',
            new \yii\db\Expression("MATCH(title, description, tags) AGAINST(:keyword)", [':keyword' => $keyword]),
            ['like', 'title', $keyword],
            ['like', 'description', $keyword],
            ['like', 'tags', $keyword]
        ]);
    }

    public function byViewer($user_id)
    {
        return $this
            ->distinct()
            ->innerJoin('{{%video_view}} vv', '{{%video}}.video_id = vv.video_id')
            ->andWhere(['vv.user_id' => $user_id]);
    }

}
