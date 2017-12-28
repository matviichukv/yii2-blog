<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Post;

class AddPostModel extends Model {
    public $blog_id;
    public $title;
    public $content;
    public $date;

    public function formName()
    {
        return 'AddPostsModel';
    }

    public function add() {
        $post = new Post();
        $post->blog_id = $this->blog_id;
        $post->title = $this->title;
        $post->content = $this->content;
        $post->date = $this->date;
        $post->save();
        return true;
    }
}