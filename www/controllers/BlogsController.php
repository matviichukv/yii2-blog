<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\AddBlogForm;

class BlogsController extends Controller {
    public function actionAll() {
        
    }

    public function actionAdd()
    {
        //if (!Yii::$app->user->isGuest) {
        //    return $this->goHome();
        //}

        $model = new AddBlogForm();
        if ($model->load(Yii::$app->request->post()) && $model->add()) {
            return $this->goBack();
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }
}