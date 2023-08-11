<?php 
namespace frontend\controllers;

use common\models\User;
use common\models\Video;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class ChannelController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['subscribe', 'unsubscribe'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verb' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'subscribe' => ['post'],
                    'unsubscribe' => ['post']
                ]
            ]
        ];
    }


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