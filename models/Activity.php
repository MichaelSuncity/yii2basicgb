<?php


namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Activity
 * @package app\models
 *
 * @property-read  User $user
 *
 */


class Activity extends ActiveRecord
{

    public static function tableName()
    {
        return 'activities';
    }


    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'dayStart' => 'Дата начала',
            'dayEnd' => 'Дата окончания',
            'userID' => 'Пользователь',
            'description' => 'Описание',
            'cycle' => 'Повторяемое событие',
            'isBlocked' => 'Блокирующее событие',
            'attachments' => 'Прикрепленные файлы',
        ];
    }

    public function rules()
    {
        return [
            [['title', 'dayStart', 'dayEnd','userID', 'description'], 'required'],
            [['title', 'description'], 'string'],
            [['title'], 'string', 'min' => 2, 'max' => 160],
            [['description'], 'string', 'min'=> 5],
            [['dayStart', 'dayEnd'], 'date', 'format' =>'php:Y-m-d'],
            [['userID'], 'integer'],
            [['cycle', 'isBlocked'], 'boolean'],
            //[['attachments'], 'file', 'maxFiles' => 5],
        ];
    }

    public function getUser()
    {
        return $this -> hasOne(User::class, ['id' => 'userID']);
    }

}