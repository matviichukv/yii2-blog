<?php

namespace app\models;

use Yii;
use app\models\Blog;
use yii\base\Model;

class ViewBlog extends Model {
    public $blog;
    public $posts;
    public $addPostModel;
} 