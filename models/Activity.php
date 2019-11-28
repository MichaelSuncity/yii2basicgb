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
    public $isBlocked = false;


    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'dayStart' => 'Дата начала события',
            'dayEnd' => 'Дата окончания события',
            'description' => 'Описание',
            'cycle' => 'Повторяемое событие?',
            'isBlocked' => 'Нет других событий в этот день?',
        ];
    }

    public function rules()
    {
        return [
            [['title', 'dayStart', 'dayEnd', 'description'], 'required'],
            [['description'], 'string', 'min'=> 5],
        ];
    }


}