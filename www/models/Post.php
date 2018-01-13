<?php

namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord {


    public static function tableName() {
        return '{{posts}}';
    }

    public static function getPostsByBlogId($id) {
        return array_reverse(self::findAll(['blog_id' => $id]));
    }
}