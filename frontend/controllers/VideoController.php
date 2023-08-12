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

    const STATUS_LIKE = 1;
    const STATUS_DISLIKE = 0;

    public $keyword;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['like', 'dislike', 'history'],
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
                    'like' => ['post'],
                    'dislike' => ['post'],
                ]
            ]
        ];
    }


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
        $dataProvider = new ActiveDataProvider([
            'query' => Video::find()->byKeyword($model->title)->andWhere(['!=' , 'video_id', $model->video_id])
        ]);
        $user = Yii::$app->user;
        $videoView = new VideoView();
        $videoView->custumSave($user->id, $video_id);
        
        return $this->render('view', ['model'=> $model, 'dataProvider' => $dataProvider]);
    }

    public function actionLike($video_id)
    {

        $video = $this->findModel($video_id);
        $user = Yii::$app->user;

        $likedVideo = Like::find()->isLikedBy($video->video_id, $user->id)->one();

        if(!$likedVideo){
            $likedVideo = new Like();
            $likedVideo->customSave($user->id, $video->video_id, self::STATUS_LIKE);
        }else if($likedVideo && $likedVideo->type === self::STATUS_LIKE){
            $likedVideo->delete();
        }else{
            $likedVideo->delete();
            $likedVideo = new Like();
            $likedVideo->customSave($user->id, $video->video_id, self::STATUS_LIKE);
        }

        return $this->renderAjax('_like_buttons', ['model' => $video]);
        
    }

    public function actionDislike($video_id)
    {
        $video = $this->findModel($video_id);
        $user = Yii::$app->user;

        $dislikedVideo = Like::find()->isLikedBy($video_id, $user->id)->one();

        if(!$dislikedVideo){
            $dislikedVideo = new Like();
            $dislikedVideo->customSave($user->id, $video_id, self::STATUS_DISLIKE);
        }else if($dislikedVideo->type === self::STATUS_DISLIKE){
            $dislikedVideo->delete();
        }else{
            $dislikedVideo->delete();
            $dislikedVideo = new Like();
            $dislikedVideo->customSave($user->id, $video_id, self::STATUS_DISLIKE);
        }
        
        return $this->renderAjax('_like_buttons', ['model' => $video]);
    }

    public function actionSearch($keyword)
    {
        $query = video::find();
        if($keyword){
            $query->byKeyword($keyword);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        return $this->render('search', ['dataProvider' => $dataProvider]);
    }

    public function findModel($video_id){
        $model = Video::findOne(['video_id' => $video_id]);
        if($model){
            return $model;
        }

        throw new NotFoundHttpException('The video does not exist');
    }
}