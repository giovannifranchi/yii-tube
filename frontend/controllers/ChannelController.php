<?php 
namespace frontend\controllers;

use common\models\User;
use yii\web\Controller;

class ChannelController extends Controller
{
    public function actionView($channel_id)
    {
        $this->layout = 'main';
        $model = User::find()->andWhere(['id' => $channel_id])->one();
        return $this->render('view', ['model' => $model]);
    }
}