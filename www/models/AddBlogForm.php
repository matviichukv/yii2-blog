<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Blog;

class AddBlogForm extends Model {
    public $name;
    public $description;

    public function rules() {
        return [
            [['id', 'description'], 'required']
        ];
    }

    public function add() {
        $blog = new Blog();
        $blog->name = $this->name;
        $blog->description = $this->description;
        $blog->save();
    }
}