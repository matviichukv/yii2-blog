<?php
namespace app\models;

use Yii\db\ActiveRecord;

class Like extends ActiveRecord {
    public static function tableName() {
        return '{{likes}}';
    }

    public static function primaryKey()
    {
      return [
         'post_id',
         'user_id',
      ];
    }
}