<?php


namespace app\controllers;


use app\models\Activity;
use yii\web\Controller;
use Yii;


class CalendarController extends Controller
{
    public function actionIndex()
    {
        $events = Activity::findAll(['userID' => Yii::$app->user->id]);
        $events = array_map(function (Activity $event) {
            return $event->toEvent();
        }, $events);
        return $this->render('month', compact('events'));
    }
}