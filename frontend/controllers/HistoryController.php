<?php

use common\models\Video;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

class HistoryController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    'allow' => true,
                    'roles' => ['@']
                ]
            ]
        ];
    }


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Video::find()->byViewer(Yii::$app->user->id)
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }
}