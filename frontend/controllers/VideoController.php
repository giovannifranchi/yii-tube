<?php

namespace frontend\controllers;

use common\models\Video;
use common\models\VideoView;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class VideoController extends Controller
{
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

        $videoView = new VideoView();
        $videoView->video_id = $video_id;
        $videoView->user_id = Yii::$app->user->id ? Yii::$app->user->id : null;
        $videoView->created_at = time();
        $videoView->save();
        
        return $this->render('view', ['model'=> $model]);
    }

    public function findModel($video_id){
        $model = Video::findOne(['video_id' => $video_id]);
        if($model){
            return $model;
        }

        throw new NotFoundHttpException('The video does not exist');
    }
}