<?php

namespace frontend\controllers;

use common\models\Video;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

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
}