<?php

namespace frontend\controllers;

use common\models\Video;
use common\models\VideoView;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class VideoController extends Controller
{

    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::class,
    //             'rules' => [
    //                 'allow' => true,
    //                 'only' => ['like', 'dislike'],
    //                 'roles' => ['@']
    //             ]
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::class,
    //             'actions' => [
    //                 'delete' => ['POST']
    //             ],
    //         ],
    //     ];
    // }


    public function actionIndex()
    {
        $this->layout = 'main';
        $dataProvider = new ActiveDataProvider([
            'query' => Video::find()
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionView($video_id)
    {
        $this->layout = 'auth';
        $model = $this->findModel($video_id);
        $user = Yii::$app->user;

        $videoView = new VideoView();
        $videoView->custumSave($user->id, $video_id);
        
        return $this->render('view', ['model'=> $model]);
    }

    public function actionLike()
    {

    }

    public function actionDislike()
    {

    }

    public function findModel($video_id){
        $model = Video::findOne(['video_id' => $video_id]);
        if($model){
            return $model;
        }

        throw new NotFoundHttpException('The video does not exist');
    }
}