<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $dayStart;
    public $dayEnd;
    public $userID;
    public $description;
    public $cycle = false;
    public $isBlocked = true;
    public $attachments;


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
            [['attachments'], 'file', 'maxFiles' => 5],
        ];
    }


}