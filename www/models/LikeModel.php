<?php

namespace app\models;
use Yii;
use Yii\base\Model;
use app\models\Like;

class LikeModel extends Model {

    public $post_id;
    public $user_id;

    public function addOrDelete() {
        $like = Like::findOne(['post_id' => $this->post_id, 'user_id' => $this->user_id]);
        if ($like !== null) {
            $like->delete();
            return;
        }
        $like = new Like();
        Yii::trace($this->post_id);
        $like->post_id = $this->post_id;
        $like->user_id = $this->user_id;
        $like->save();
    }

    public function getLikes() {
        return count(Like::findAll(['post_id' => $this->post_id]));
    }

    
}