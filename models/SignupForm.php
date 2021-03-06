<?php


namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;

class SignupForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин: ',
            'password' => 'Пароль: ',
            ];
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new User([
                'username' => $this->username,
                'access_token' => "{$this->username}-token",
                //'created_at' => time(),
                //'updated_at' => time(),
            ]);
            $user->setPassword($this->password);
            $user->generateAuthKey();

            if ($user->save()) {
                $auth = Yii::$app->authManager;
                $role = $auth->getRole('user');
                $auth->assign($role, $user->id);
                return Yii::$app->user->login($user);
            }
        }
            /*if($user->save()){
                return Yii::$app->user->login($user);
            }/*
            /*$user->save(false);

            // нужно добавить следующие три строки:
            $auth = Yii::$app->authManager;
            $authorRole = $auth->getRole('author');
            $auth->assign($authorRole, $user->getId());

            return $user;*/


        return false;
    }

}