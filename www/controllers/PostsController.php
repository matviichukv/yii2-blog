<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\AddPostModel;
use app\models\PostModel;

class PostsController extends Controller         {
    public function actionAdd() {
        $model = new AddPostModel();
        $model->blog_id = Yii::$app->request->post('AddPostsModel')['blog_id'];
        $model->title = Yii::$app->request->post('AddPostsModel')['title'];
        $model->content = Yii::$app->request->post('AddPostsModel')['content'];
        $model->date = date('Y-m-d H:i:s');
        $model->add();
        return $this->redirect('/blogs/view?id='.($model->blog_id));
    }

    public function actionDelete() {
        $model = new PostModel();
        $model->delete(Yii::$app->request->post('post_id'));
        return 1;
    }
}