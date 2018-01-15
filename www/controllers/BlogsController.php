<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\AddBlogForm;
use app\models\Blog;
use app\models\BlogModel;
use app\models\ViewBlog;
use app\models\Post;
use app\models\AddPostModel;

class BlogsController extends Controller {

    private function getUserId()
    {
        return Yii::$app->user->identity->getId();
    }

    public function actionYour() {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return $this->render('yourBlogs', [ 'blogs' => Blog::getBlogsByUserId($this->getUserId()) ] );
    }

    public function actionAdd()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new AddBlogForm();
        $model->owner_id = $this->getUserId();
        Yii::trace($model->owner_id);
        if ($model->load(Yii::$app->request->post()) && $model->add()) {
            return $this->goBack();
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }

    public function actionView() {
        $blogId = Yii::$app->request->get('id');
        $blog = new ViewBlog();
        $blog->blog = Blog::findOne($blogId);
        $blog->posts = Post::getPostsByBlogId($blogId);
        $blog->addPostModel = new AddPostModel();
        $blog->addPostModel->blog_id = $blogId;
        return $this->render('view', ['blog' => $blog]);
    }

    public function actionDelete() {
        $blogId = Yii::$app->request->post('blog_id');
        $model = new BlogModel();
        $model->delete($blogId);
    }
}