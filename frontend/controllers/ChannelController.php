<?php 
namespace frontend\controllers;

use yii\web\Controller;

class ChannelController extends Controller
{
    public function actionView($channel_id)
    {
        $this->layout = 'auth';
        $model = 'channel view' . $channel_id;
        return $this->render('view', ['model' => $model]);
    }
}