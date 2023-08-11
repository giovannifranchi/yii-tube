<?php 
namespace frontend\controllers;

use common\models\Subscriber;
use common\models\User;
use common\models\Video;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;

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

    public function actionSubscribe($channel_id)
    {
        $model = User::findOne(['id' => $channel_id]);
        $subscriber = Yii::$app->user->id;
        $subscription = $model->isSubscribedBy($subscriber);
        if(!$subscription){
            $subscription = new Subscriber();
            $subscription->customSave($channel_id, $subscriber);
        }else {
            $currenSubscription = Subscriber::find()->where(['channel_id' => $model->id, 'subscriber_id' => $subscriber])->one();
            $currenSubscription->delete();
        }
        return $this->renderAjax('_button_subscribe', ['model' => $model]);
    }
}