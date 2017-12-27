<?php

namespace app\models;

use Yii;
use yii\base\Model;

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
            ['email', 'email']
        ];
    }

    public function register()
    {
        
    }
}