<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;
use app\models\AddPostModel;

class PostsController extends Controller {
    public function actionAdd() {
        $model = new AddPostModel();
        //$model->load(); 
        //$model->blog_id = ;
        Yii::trace(Yii::$app->request->post('AddPostsModel')['blog_id']);
        $model->date = date('Y-m-d H:i:s');
        $model->add();
        return $this->goBack();
    }
}