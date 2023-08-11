<?php 
namespace frontend\controllers;

use common\models\User;
use common\models\Video;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ChannelController extends Controller
{
    public function actionView($channel_id)
    {
        $this->layout = 'channel';
        $dataProvider = new ActiveDataProvider([
            'query' => Video::find()->andWhere(['created_by' => $channel_id]),
        ]);
        $model = User::find()->andWhere(['id' => $channel_id])->one();
        return $this->render('view', ['model' => $model, 'dataProvider' => $dataProvider]);
    }
}