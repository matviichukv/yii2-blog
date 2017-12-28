<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Blog;

class AddBlogForm extends Model {
    public $name;
    public $description;
    public $owner_id;

    public function rules() {
        return [
            [['name', 'description', 'owner_id'], 'required']
        ];
    }

    public function add() {
        $blog = new Blog();
        $blog->name = $this->name;
        $blog->description = $this->description;
        $blog->owner_id = $this->owner_id;
        $blog->save();
        return true;
    }
}