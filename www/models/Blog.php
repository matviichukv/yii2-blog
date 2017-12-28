<?php

namespace app\models;

use Yii;

class Blog extends \yii\db\ActiveRecord
{
    

    public static function tableName() {
        return '{{blogs}}';
    }

    public static function getBlogsByUserId($id) {
        return self::findAll(['owner_id' => $id]);
    }
}