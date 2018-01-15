<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

use app\models\LikeModel;


class LikesController extends Controller {
    public function actionLike() {
        $model = new LikeModel();
        $model->post_id = Yii::$app->request->post('post_id');
        $model->user_id = Yii::$app->request->post('user_id');
        $model->addOrDelete();
        return $model->getLikes();
    }

    public function actionAll() {
        $model = new LikeModel();
        $model->post_id = Yii::$app->request->post('post_id');
        return $model->getLikes();
    }

    
}