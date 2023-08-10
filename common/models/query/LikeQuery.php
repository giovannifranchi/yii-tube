<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Like]].
 *
 * @see \common\models\Like
 */
class LikeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Like[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Like|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function isLikedBy($_video_id, $_user_id){
        return $this->andWhere(['user_id' => $_user_id])->andWhere(['video_id' => $_video_id]);
    }
}
