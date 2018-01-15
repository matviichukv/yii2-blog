<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Post;

class PostModel extends Model {
    public $blog_id;
    public $title;
    public $content;
    public $date;

    public function delete($post_id) {
        $post = Post::findOne($post_id);
        $post->delete();
    }
}