<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use yii\validators\UniqueValidator;
use yii\db\IntegrityException; 

class RegisterForm extends Model
{
    public $username;
    public $password;
    public $email;

    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            ['email', 'email'],
            [['username', 'email'], 'unique', 'targetAttribute' => ['username', 'email']]
        ];
    }

    public function register()
    {
        $user = new User();
        $user->username = $this->username;
        $user->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        $user->email = $this->email;
        $user->avatar = 'default.jpg';
        try{
            $user->save();
        }
        catch (IntegrityException $e) {
            $this->addError('', 'Username or email is already taken');
            return false;
        }

    }
}