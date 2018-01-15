<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Blog;

class BlogModel extends Model {

    public function delete($blog_id) {
        $blog = Blog::findOne($blog_id);
        $blog->delete();
    }
}