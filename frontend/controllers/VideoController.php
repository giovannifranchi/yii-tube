<?php

namespace frontend\controllers;

use common\models\Like;
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

    public function actionLike($video_id)
    {
        $video = $this->findModel($video_id);
        $user = Yii::$app->user;

        $likedVideo = Like::find()->isLikedBy($video->video_id, $user->id);

        if(!$likedVideo){
            $likedVideo = new Like();
            $likedVideo->user_id = $user->id;
            
        }
        
 
    }

    public function actionDislike($video_id)
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